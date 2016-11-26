<?php
	
	$courses = get_courses();
	$the_course = key( $courses );
	$the_session = $the_subject = 1;
	

if( isset( $_POST[ "calculate" ] ) && isset( $courses[ ( $_POST[ "calculate" ] ) ] ) ) :
	
	$courseinfo = $courses[ ( $_POST[ "calculate" ] ) ];
	$session = ( isset( $_POST[ "session" ] ) && intval( $_POST[ "session" ] ) > 0 && intval( $_POST[ "session" ] ) < count( $courseinfo[ "subjects" ] ) ) ? intval( $_POST[ "session" ] ) : 1;
	
	$average = 0;
?>
			<div id="page_title_w">
                <h1>AcademicDOC</h1>
                <h3>Cálculo das notas dos cursos da Faci DeVry</h3>
			</div>
            <div id="container">
            	<div id="rep_info">
            		<h2><?= $courseinfo[ "title" ];?></h2>
                	<h4><?= $session;?>º semestre</h4>
                </div>
                
                <div id="results_table_wrapper">
                	<table cellpadding="0" cellspacing="0" id="results">
                    	<tr>
                        	<th align="left" rowspan="2">Disciplina</th>
                            <th rowspan="2">AP1</th>
                            <th rowspan="2">AP2</th>
                            <th rowspan="2">AP3</th>
                            <th rowspan="2">Média</th>
                            <th rowspan="2">Situação</th>
                            <th colspan="3">Estimativas<span style="color:#F00;">*</span></th>
                        </tr>
                        <tr>
                        	<th colspan="1" id="sub_th">AP1</th>
                            <th colspan="1" id="sub_th">AP2</th>
                            <th colspan="1" id="sub_th">AP3</th>
                        </tr>
                        <?php
						$averageCount = 0;
						
						for( $i = 0; $i < count( $courseinfo[ "subjects" ][ ( $session - 1 ) ] ); $i++ ) :
							$calc = new controller\academicdocMain();
							$calc->setAp1( @$_POST[ "ap1" ][ ( $_POST[ "calculate" ] ) ][ $session ][ ( $i + 1 ) ] );
							$calc->setAp2( @$_POST[ "ap2" ][ ( $_POST[ "calculate" ] ) ][ $session ][ ( $i + 1 ) ] );
							$calc->setAp3( @$_POST[ "ap3" ][ ( $_POST[ "calculate" ] ) ][ $session ][ ( $i + 1 ) ] );
							$calc->setSubjectTitle( $courseinfo[ "subjects" ][ ( $session - 1 ) ][ $i ] );
							$calc->calculate();
							
							$errors = $calc->getErrors();
							$estimates = $calc->getEstimates();
							
							if( $calc->getPartialAverage() !== false ) :
								$average += $calc->getPartialAverage();
								$averageCount++;
							elseif( $calc->getAverage() !== "-" ) :
								$average += $calc->getAverage();
								$averageCount++;
							endif;
						?>
                        <tr<?php if( $i % 2 == 0 ) echo ' class="bg-line"';?>>
                        	<td align="left"><?= $courseinfo[ "subjects" ][ ( $session - 1 ) ][ $i ];?></td>
							<td align="center">
								<?= $calc->getAp1();?>
								<?php if( isset( $errors[ "ap1" ] ) ) :?>
                                <div id="error_display">
                                	<a href="#" onClick="return false;"></a>
                                    <div id="sub_menu"><?= $errors[ "ap1" ];?></div>
                                </div>
								<?php endif;?>
							</td>
							<td align="center">
								<?= $calc->getAp2();?>
								<?php if( isset( $errors[ "ap2" ] ) ) :?>
                                <div id="error_display">
                                	<a href="#" onClick="return false;"></a>
                                    <div id="sub_menu"><?= $errors[ "ap2" ];?></div>
                                </div>
								<?php endif;?>
							</td>
							<td align="center">
								<?= $calc->getAp3();?>
								<?php if( isset( $errors[ "ap3" ] ) ) :?>
                                <div id="error_display">
                                	<a href="#" onClick="return false;"></a>
                                    <div id="sub_menu"><?= $errors[ "ap3" ];?></div>
                                </div>
								<?php endif;?>
                            </td>
                            <td align="center">
								<?php
                                if( $calc->getAverage() == "-" && $calc->getPartialAverage() !== false ) :
									
									$partialAverage = $calc->getPartialAverage();
									
									echo $partialAverage;
								else :
									echo $calc->getAverage();
								endif;
								?>
                            </td>
                            <td align="center"><?= $calc->getStatus();?></td>
                            <td align="center" id="sub_td"><?php echo ( isset( $estimates[ "AP1" ] ) ) ? $estimates[ "AP1" ] : '-'; ?></td>
                            <td align="center" id="sub_td"><?php echo ( isset( $estimates[ "AP2" ] ) ) ? $estimates[ "AP2" ] : '-'; ?></td>
                            <td align="center" id="sub_td"><?php echo ( isset( $estimates[ "AP3" ] ) ) ? $estimates[ "AP3" ] : '-'; ?></td>
                        </tr>
                        <?php
						endfor;
						?>
                    </table>
                    <span id="footer_legend"><span style="color:#F00;">*</span> Notas estimadas para se obter 5,0 pontos de média.</span>
				</div>
                
                <div id="comments_container">
                    <div id="rep_info">
                        <h2>Observações</h2>
                        <h4>Dados importantes</h4>
                    </div>
                    <div id="comments_table_wrapper">
                        <?php
                        $newcalc = new controller\academicdocMain;
                        ?>
                        <table cellpadding="0" cellspacing="0" id="comments">
                            <tr>
                                <th colspan="3">Maior nota</th>
                                <th colspan="3">Menor nota</th>
                                <th colspan="3">Maior média</th>
                                <th colspan="3">Menor média</th>
                            </tr>
                            <tr valign="top">
                                <td class="legend">Disc.:</td>
                                <td colspan="2"><?= $newcalc->getHighest()->subject;?></td>
                                <td class="legend">Disc.:</td>
                                <td colspan="2"><?= $newcalc->getLowest()->subject;?></td>
                                <td class="legend">Disc.:</td>
                                <td colspan="2"><?= $newcalc->getHighestAverage()->subject;?></td>
                                <td class="legend">Disc.:</td>
                                <td colspan="2"><?= $newcalc->getLowestAverage()->subject;?></td>
                            </tr>
                            <tr valign="top">
                                <td class="legend">Em:</td>
                                <td colspan="2"><?= $newcalc->getHighest()->test;?></td>
                                <td class="legend">Em:</td>
                                <td colspan="2"><?= $newcalc->getLowest()->test;?></td>
                                <td class="legend" rowspan="2">Média:</td>
                                <td colspan="2" rowspan="2"><?= $newcalc->getHighestAverage()->score;?></td>
                                <td class="legend" rowspan="2">Média:</td>
                                <td colspan="2" rowspan="2"><?= $newcalc->getLowestAverage()->score;?></td>
                            </tr>
                            <tr id="last" valign="top">
                                <td class="legend">Nota:</td>
                                <td colspan="2"><?= $newcalc->getHighest()->score;?></td>
                                <td class="legend">Nota:</td>
                                <td colspan="2"><?= $newcalc->getLowest()->score;?></td>
                            </tr>
                            <tr valign="top">
                                <th colspan="3">Média geral</th>
                                <th colspan="3">Notas não informadas</th>
                                <th colspan="3">Maior nota estimada</th>
                                <th colspan="3">Menor nota estimada</th>
                            </tr>
                            <tr valign="top">
                                <td rowspan="3" colspan="3" id="single">
								<?php
								$subjectCount = count( $courseinfo[ "subjects" ][ ( $session - 1 ) ] );
								
								if( $averageCount == $subjectCount )
									echo floatval( number_format( ( $average / $subjectCount ), 1 ) );
								else
									echo "-";
								?>
                                </td>
                                <td rowspan="3" colspan="3" id="single"><?= $newcalc->getEstimatesNum();?></td>
                                <td class="legend">Disc.:</td>
                                <td colspan="2"><?= $newcalc->getHighestEstimate()->subject;?></td>
                                <td class="legend">Disc.:</td>
                                <td colspan="2"><?= $newcalc->getLowestEstimate()->subject;?></td>
                            </tr>
                            <tr valign="top">
                                <td class="legend">Em:</td>
                                <td colspan="2"><?= $newcalc->getHighestEstimate()->test;?></td>
                                <td class="legend">Em:</td>
                                <td colspan="2"><?= $newcalc->getLowestEstimate()->test;?></td>
                            </tr>
                            <tr id="last" valign="top">
                                <td class="legend">Nota:</td>
                                <td colspan="2"><?= $newcalc->getHighestEstimate()->score;?></td>
                                <td class="legend">Nota:</td>
                                <td colspan="2"><?= $newcalc->getLowestEstimate()->score;?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <a href="#" onClick="return false;" id="showComments"><span id="text">Mostrar observações</span><span id="icon"></span></a>
                <a href="?course=<?php echo $_POST[ "calculate" ] . ( ( $session > 1 ) ? "&session=" . $session : "" );?>" id="calc_return">Retornar</a>
            </div>
<?php
else :
	
	if( isset( $_GET[ "course" ] ) && !empty( $_GET[ "course" ] ) ) :
		if( isset( $courses[ ( $_GET[ "course" ] ) ] ) )
			$the_course = $_GET[ "course" ];
	endif;
	
	
	if( isset( $_GET[ "session" ] ) && !empty( $_GET[ "session" ] ) ) :
		if( is_numeric( $_GET[ "session" ] ) && (int)$_GET[ "session" ] > 0 && (int)$_GET[ "session" ] <= count( $courses[ $the_course ][ "subjects" ] ) )
			$the_session = $_GET[ "session" ];
	endif;
	
	if( isset( $_GET[ "subject" ] ) && !empty( $_GET[ "subject" ] ) ) :
		if( is_numeric( $_GET[ "subject" ] ) && (int)$_GET[ "subject" ] > 0 && (int)$_GET[ "subject" ] <= count( $courses[ $the_course ][ "subjects" ][ ( $the_session - 1 ) ] ) )
			$the_subject = $_GET[ "subject" ];
	endif;
	
?>
            <div id="page_title_w">
                <h1>AcademicDOC</h1>
                <h3>Cálculo das notas dos cursos da Faci DeVry</h3>
                
                <div id="courses">
                	<h4>Selecione seu curso</h4>
                    <div id="combobox_courses">
                    	<a href="#" id="button" onClick="return false;"><span id="legend"><span><?= $courses[ $the_course ][ "title" ];?></span></span><span id="icon"></span></a>
                    	<ul id="sub_menu">
						<?php
							$courses_ordered = $courses;
							ksort( $courses_ordered );
							
							$chapter = "";
							$i = 0;
							
							foreach( $courses_ordered as $slug => $info ) :
								$first = substr( $info[ "title" ], 0, 1 );
						?>
						<?php if( $chapter != $first ) : $chapter = $first; ?>
									
							<?php if( $i > 0 ) : ?>
                            	</ul><!-- #subitem -->
                            </li><!-- #section -->
							<?php endif;?>
                            <li id="section">
                            	<span id="sec_title"><?= $chapter;?></span>
                            	<ul>
						<?php endif;?>
                                	<li id="course"><a href="?course=<?= $slug;?>" <?php if( $slug == $the_course ) echo 'class="selected" ';?>rel="bookmark"><?= $info["title"];?></a></li>
							<?php if( $i == ( count( $courses_ordered ) - 1 ) ) :?>
								</ul><!-- #subitem -->
                            </li><!-- #section -->
                        	<?php endif;?>
						<?php
                            	$i++;
							endforeach;
						?>
                        </ul>
                        <div id="clear"></div>
                    </div>
                </div>
            </div>
            
            <div id="container">
                <div id="semesters_wrapper">
                	<h4><span>Períodos</span></h4>
                    <div id="semesters">
					<?php for( $i = 1; $i <= count( $courses[ $the_course ][ "subjects" ] ); $i++ ) : ?>
                    	<a href="?course=<?= $the_course;?>&session=<?= $i?>" <?php if( $i == $the_session ) echo 'class="selected" ';?>data-index="<?= $i;?>" rel="bookmark"><?= $i;?></a>
                    <?php endfor;?>
                    	<div id="clear"></div>
                    </div>
                    
                    <div id="subjects_wrapper">
                   	<?php
                    	for( $i = 1; $i <= count( $courses[ $the_course ][ "subjects" ] ); $i++ ) :
							$session_info = $courses[ $the_course ][ "subjects" ][ ( $i - 1 ) ];
					?>
                    	<div class="sessions<?php if( $i == $the_session ) echo ' selected';?>" id="session_<?= $i;?>">
                        	<form enctype="multipart/form-data" method="post" action="" autocomplete="off">
                            	<div id="subjects_container">
								<?php for( $ind = 1; $ind <= count( $session_info ); $ind++ ) :?>
                                    <div id="subject"<?php if( ( $i != $the_session && $ind == 1 ) || ( $ind == $the_subject && $i == $the_session ) ) echo ' class="selected"';?>>
                                        <h1><?= $session_info[ ( $ind - 1 ) ];?></h1>
                                        <h3>Informe suas notas abaixo</h3>
                                        <div id="text_field">
                                            <label>
                                                <span id="legend">AP1</span>
                                                <div id="field_wrapper">
                                                    <input type="text" name="ap1[<?= $the_course;?>][<?= $i;?>][<?= $ind;?>]" />
                                                </div>
                                            </label>
                                        </div>
                                        <div id="text_field">
                                            <label>
                                                <span id="legend">AP2</span>
                                                <div id="field_wrapper">
                                                    <input type="text" name="ap2[<?= $the_course;?>][<?= $i;?>][<?= $ind;?>]" />
                                                </div>
                                            </label>
                                        </div>
                                        <div id="text_field">
                                            <label>
                                                <span id="legend">AP3</span>
                                                <div id="field_wrapper">
                                                    <input type="text" name="ap3[<?= $the_course;?>][<?= $i;?>][<?= $ind;?>]" />
                                                </div>
                                            </label>
                                        </div>
                                        <div id="clear"></div>
                                        <input type="hidden" name="subject[<?= $ind;?>]" value="<?= $session_info[ ( $ind - 1 ) ];?>" />
                                    </div>
                                <?php endfor;?>
                                    <input type="hidden" name="course" value="<?= $the_course;?>" />
                                    <input type="hidden" name="session" value="<?= $i;?>" />
								<?php
									if( $i != $the_session )
										$subject_value = 1;
									else
										$subject_value = $the_subject;
										
									$prev = ( $subject_value - 1 > 1 ) ? $subject_value - 1 : 1;
									$next = ( $subject_value + 1 < count( $session_info ) ) ? $subject_value + 1 : count( $session_info );
								?>
                                </div>
                                <div class="nav-subjects">
                                    <a href="?course=<?= $the_course;?>&session=<?= $i;?>&subject=<?= $prev;?>" <?php if( $prev == 1 ) echo 'class="disabled" ';?>id="prev">Voltar</a>
                                    <a href="?course=<?= $the_course;?>&session=<?= $i;?>&subject=<?= $next;?>" <?php if( $next == count( $session_info ) ) echo 'class="disabled" ';?>id="next">Avançar</a>
                                	<div id="clear"></div>
                                </div>
                                <input type="hidden" name="calculate" value="<?= $the_course;?>" />
                                <input type="submit" id="submit" value="Calcular notas" />
                            </form>
                        </div>
					<?php endfor;?>
                    </div>
                </div>
                
            </div>
<?php endif; ?>