<?php

function get_courses() {
	
	$courses = array(
		"analise-e-desenvolvimento-de-sistemas" => array(
			"title" => "Análise e Desenvolvimento de Sistemas",
			"coordinator" => array(
				"name" => "Profº Iranildo Ramos da Encarnação",
				"email" => "iencarnacao@faculdadeideal.edu.br"
	    	),
			"subjects" => array(
				array(
					"Algoritmos Computacionais",
					"Cálculo",
					"Carreira, Liderança e Trabalho em Equipe",
					"Empreendedorismo",
					"Informática e Sociedade",
					"Temas Tecnológicos em Humanidades",
					"Estudos de Caso em Carreira e Empreendedorismo"
				),
				array(
					"Estatística",
					"Introdução à Informática",
					"Matemática Básica",
					"Metodologia da Pesquisa",
					"Programação Orientada a Objetos",
					"Temas Tecnológicos em Raciocínio Lógico e Matemático",
					"Estudos de Caso em Humanidades e Meio Ambiente"
				),
				array(
					"Análise Orientada a Objetos",
					"Desenvolvimento de Software",
					"Laboratório de Desenvolvimento de Sistemas",
					"Segurança e Auditoria",
					"Tópicos em Desenvolvimento de Sistemas",
					"Temas Tecnológicos em Desenvolvimento e Segurança de Sistemas",
					"Estudos de Caso em Análise e Desenvolvimento de Sistemas"
				),
				array(
					"Engenharia de Software",
					"Linguagem de Programação",
					"Programação Avançada",
					"Programação Web",
					"Sistemas Operacionais",
					"Temas Tecnológicos em Programação",
					"Estudos de Caso em Computação Móvel"
				),
				array(
					"Bancos de Dados",
					"Estrutura de Dados",
					"Laboratório de Banco de Dados",
					"Laboratório de Redes",
					"Redes de Computadores",
					"Temas Tecnológicos em Infraestrutura Tecnológica",
					"Estudos de Caso em Matemática Aplicada"
				)
			)
		),
		"redes-de-computadores" => array(
			"title" => "Redes de Computadores",
			"coordinator" => array(
				"name" => "Profº Iranildo Ramos da Encarnação",
				"email" => "iencarnacao@faculdadeideal.edu.br"
			),
			"subjects" => array(
				array(
					"Algoritmos Computacionais",
					"Cálculo",
					"Carreira, Liderança e Trabalho em Equipe",
					"Empreendedorismo",
					"Informática e Sociedade",
					"Temas Tecnológicos em Humanidades",
					"Estudos de Caso em Carreira e Empreendedorismo"
				),
				array(
					"Estatística",
					"Introdução à Informática",
					"Matemática Básica",
					"Metodologia da Pesquisa",
					"Programação Orientada a Objetos",
					"Temas Tecnológicos em Raciocínio Lógico e Matemático",
					"Estudos de Caso em Humanidades e Meio Ambiente"
				),
				array(
					"Bancos de Dados",
					"Governança em TI",
					"Laboratório de Banco de Dados",
					"Modelagem de Dados",
					"Segurança e Auditoria",
					"Temas Tecnológicos em Banco de Dados e Governança",
					"Estudos de Caso em Redes de Computadores"
				),
				array(
					"Análise e Monitoramento de Desempenho",
					"Estrutura de Dados",
					"Programação de Serviços de Rede",
					"Sistemas de Informações Gerenciais",
					"Tópicos Avançados em Redes",
					"Temas Tecnológicos em Administração e Serviços de Redes",
					"Estudos de Caso em Computação Móvel"
				),
				array(
					"Laboratório de Redes - Código Livre",
					"Laboratório de Redes - Windows",
					"Protocolos de Comunicação TCP/IP",
					"Redes de Computadores",
					"Sistemas Operacionais",
					"Temas Tecnológicos em Redes de Computadores",
					"Estudos de Caso em Matemática Aplicada"
				)
			)
		),
		"pedagogia" => array(
			"title" => "Pedagogia",
			"coordinator" => array(
				"name" => "Profª Lucidea de Oliveira Santos",
				"email" => "lsantos35@faculdadeideal.edu.br"
			),
			"subjects" => array(
				array(
					"Ciências do Ambiente",
					"Ciências Humanas e Sociais",
					"Filosofia e Ética",
					"História da Educação",
					"Metodologia da Pesquisa",
					"Estudos de Caso em Humanidades e Meio Ambiente"
				),
				array(
					"Arte e Educação",
					"Língua Portuguesa",
					"Políticas Públicas na Educação",
					"Psicologia do Desenvolvimento",
					"Saúde e Educação",
					"Estudos de Caso em História, Arte e Cultura"
				),
				array(
					"Currículos e Programas",
					"Didática Geral",
					"Legislação e Organização da Educação Básica",
					"Organização do Trabalho Pedagógico",
					"Psicologia da Aprendizagem",
					"Estudos de Caso nas Correntes de Aprendizagem"
				),
				array(
					"Conteúdo e Metodologia da Educação Infantil",
					"Linguística e Educação",
					"Literatura Infantil",
					"Metodologia e Prática da Alfabetização",
					"Psicomotricidade e Ludicidade",
					"Estudos de Caso na Alfabetização"
				),
				array(
					"Cultura e Promoção da Igualdade Etnico-racial",
					"Fundamentos da Educação Profissional",
					"Orientação e Supervisão na Educação Básica",
					"Paradigmas em Ambientes Não Escolares",
					"Pedagogia de Projetos",
					"Estudos de Caso em Pedagogia I"
				),
				array(
					"Metodologia e Prática da Matemática",
					"Metodologia e Prática das Ciências Naturais",
					"Pedagogia Empresarial",
					"Planejamento Educacional",
					"Psicopedagogia",
					"Estudos de Caso em Matemática na Educação"
				),
				array(
					"Carreira, Liderança e Trabalho em Equipe",
					"Educação de Jovens e Adultos",
					"Educação do Campo",
					"Informática Aplicada a Educação",
					"Língua Brasileira de Sinais",
					"Estudos de Caso em Pedagogia II"
				),
				array(
					"Avaliação Educacional",
					"Estatística Aplicada a Educação",
					"Metodologia e Prática da Inclusão Educacional",
					"Metodologia e Prática das Ciências Sociais",
					"Metodologia e Prática do Ensino da Língua Portuguesa",
					"Estudos de Caso em Avaliação Educacional"
				)
			)
		),
		"processos-gerenciais" => array(
			"title" => "Processos Gerencias",
			"coordinator" => array(
				"name" => "Profº Ilmar Lopes",
				"email" => "isoares@faculdadeideal.edu.br"
			),
			"subjects" => array(
				array(
					"Cenário Micro e Macro Econômico",
					"Estatística",
					"Gestão Empresarial	",
					"Língua Portuguesa",
					"Psicologia Aplicada",
					"Temas Tecnológicos em Fundamentos de Gestão",
					"Estudos de Caso em Carreira e Empreendedorismo"
				),
				array(
					"Gestão de Tributos e Análise de Crédito",
					"Gestão Estratégica de Processos",
					"Logística e Distribuição",
					"Planejamento e Controle Financeiro",
					"Processos Gerenciais",
					"Temas Tecnológicos em Planejamento Financeiro",
					"Estudos de Caso em Humanidades e Meio Ambiente"
				),
				array(
					"Controladoria",
					"Cultura e Mudança Organizacional",
					"Economia Contemporânea",
					"Gestão da Produção e Qualidade",
					"Planejamento de Marketing",
					"Temas Tecnológicos em Gestão Avançada de Processos",
					"Estudos de Caso em Processos Gerenciais"
				),
				array(
					"Carreira, Liderança e Trabalho em Equipe",
					"Empreendedorismo",
					"Gestão de Operações, Estoques e Produção",
					"Gestão do Capital Humano",
					"Tecnologia e Gestão da Informação	",
					"Temas Tecnológicos em Empreendedorismo Gerencial",
					"Estudos de Caso em Matemática Aplicada"
				)
			)
		),
		"administracao" => array(
			"title" => "Administração",
			"coordinator" => array(
				"name" => "Profº. Ilmar Lopes Soares",
				"email" => "isoares@faculdadeideial.edu.br"
			),
			"subjects" => array(
				array(
					"Língua Portuguesa",
					"Matemática",
					"Psicologia Aplicada",
					"Sociologia e Política",
					"Teorias da Administração"
				),
				array(
					"Ciências Humanas e Sociais",
					"Contabilidade Geral - Introdutória",
					"Direito Empresarial e Fundamentos",
					"Fundamentos de Micro e Macro Economia",
					"Fundamentos de Tecnologia da Informação"
				),
				array(
					"Contabilidade de Custos",
					"Economia Contemporânea",
					"Matemática Financeira",
					"Metodologia da Pesquisa",
					"Processos da Administração"
				),
				array(
					"Administração Mercadológica",
					"Carreira, Liderança e Trabalho em Equipe",
					"Comunicação Empresarial",
					"Estatística",
					"Gestão de Serviços"
				),
				array(
					"Administração da Produção",
					"Administração Orçamentária e Orçamento Público",
					"Gestão de Suprimentos",
					"Logística Empresarial",
					"Pesquisa Operacional"
				),
				array(
					"Administração Mercadológica Avançada",
					"Empreendedorismo",
					"Gestão de Pequenas e Médias Empresas",
					"Gestão Estratégica",
					"Tecnologias Empresariais"
				),
				array(
					"Gestão de Projetos e Tópicos Especiais",
					"Gestão do Capital Humano",
					"Gestão e Responsabilidade Social",
					"Mudança e Comportamento Organizacional",
					"Negociação e Jogos de Empresas"
				),
				array(
					"Administração de Sistemas de Informação",
					"Administração Financeira",
					"Direito Empresarial Avançado",
					"Gestão Tributária",
					"Mercado de Capitais"
				)
			)
		),
		"arquitetura-e-urbanismo" => array(
			"title" => "Arquitetura e Urbanismo",
			"coordinator" => array(
				"name" => "Profª. Rachel Sfair Ferreira Benzecry",
				"email" => "rbenzecry@faculdadeideal.edu.br"
			),
			"subjects" => array(
				array(
					"Desenho de Observação Aplicado a Arquitetura",
					"Geometria Descritiva",
					"Língua Portuguesa",
					"Metodologia de Projeto Arquitetônico",
					"Teoria de Arquitetura e Urbanismo"
				),
				array(
					"Análise e Composição da Forma",
					"Desenho de Arquitetura",
					"Matemática Aplicada à Arquitetura",
					"Sociologia Urbana",
					"Teoria da Percepção"
				),
				array(
					"Ciências Humanas e Sociais",
					"Desenho Executivo e Perspectivo",
					"Fundamentos de Bioclimatologia e Sustentabilidade",
					"Metodologia de Análise e Planejamento Urbano",
					"Projeto de Pequenas Estruturas"
				),
				array(
					"Física Aplicada",
					"Iluminação Natural e Acústica",
					"Projeto Residencial Unifamiliar",
					"Sistema de Análise Urbana",
					"Topografia"
				),
				array(
					"Estética e História da Arte",
					"Instalações Hidro-sanitárias",
					"Intervenção Urbana Local",
					"Materiais de Construção",
					"Projeto Comercial"
				),
				array(
					"Acessibilidade e Mobilidade Urbana",
					"História da Arquitetura e do Urbanismo Clássico e Barroco",
					"Instalações Elétricas",
					"Projeto Institucional",
					"Resistência dos Materiais"
				),
				array(
					"História da Arquitetura e do Urbanismo Moderno",
					"Intervenção Urbana Regional",
					"Metodologia da Pesquisa",
					"Projeto Hoteleiro",
					"Técnicas de Materiais de Construção"
				),
				array(
					"Arquitetura de Interiores",
					"História da Arquitetura e do Urbanismo no Brasil",
					"Projeto de Paisagismo",
					"Projeto Pólo Gerador",
					"Sistemas de Aço e Madeira"
				),
				array(
					"Carreira, Liderança e Trabalho em Equipe",
					"História da Arquitetura e do Urbanismo Contemporâneo",
					"Projeto da Edificação Hospitalar",
					"Sistema Integrado de Urbanismo",
					"Sistemas de Concreto Armado"
				),
				array(
					"Custos de Projeto e Orçamentação de Obras",
					"Estudos Brasileiros",
					"Gestão de Projetos e Obras",
					"Paisagismo Urbano",
					"Técnicas Retrospectivas"
				)
			)
		),
		"ciencias-contabeis" => array(
			"title" => "Ciências Contábeis",
			"coordinator" => array(
				"name" => "Profº. Ilmar Lopes Soares",
				"email" => "isoares@faculdadeideial.edu.br"
			),
			"subjects" => array(
				array(
					"Língua Portuguesa",
					"Matemática",
					"Psicologia Aplicada",
					"Sociologia e Política",
					"Teorias da Administração"
				),
				array(
					"Ciências Humanas e Sociais",
					"Contabilidade Geral - Introdutória",
					"Direito Empresarial e Fundamentos",
					"Fundamentos de Micro e Macro Economia",
					"Fundamentos de Tecnologia da Informação"
				),
				array(
					"Contabilidade de Custos",
					"Economia Contemporânea",
					"Matemática Financeira",
					"Metodologia da Pesquisa",
					"Processos da Administração"
				),
				array(
					"Carreira, Liderança e Trabalho em Equipe",
					"Contabilidade Comercial",
					"Contabilidade Intermediária",
					"Estatística",
					"Gestão Estratégica"
				),
				array(
					"Administração Orçamentária e Orçamento Público",
					"Contabilidade Internacional",
					"Contabilidade Tributária",
					"Gestão Tributária",
					"Teorias e Escolas do Pensamento Contábil"
				),
				array(
					"Análise das Demonstrações Contábeis",
					"Auditoria",
					"Contabilidade Societária",
					"Controladoria",
					"Empreendedorismo"
				),
				array(
					"Contabilidade Governamental",
					"Legislação e Ética",
					"Perícia e Arbitragem",
					"Sistemas de Informações Contábeis",
					"Tópicos Especiais em Contabilidade"
				),
				array(
					"Administração Financeira",
					"Contabilidade Avançada e Gerencial",
					"Direito Comercial e Tributário",
					"Práticas Contábeis",
					"Projeto de Análise de Investimentos"
				)
			)
		),
		"construcao-de-edificios" => array(
			"title" => "Construção de Edifícios",
			"coordinator" => array(
				"name" => "Bianca Oliveira Fernandez",
				"email" => ""
			),
			"subjects" => array(
				array(
					"Cenário Micro e Macro Econômico",
					"Estatística",
					"Gestão Empresarial",
					"Língua Portuguesa",
					"Psicologia Aplicada",
					"Temas Tecnológicos em Fundamentos de Gestão",
					"Estudos de Caso em Carreira e Empreendedorismo"
				),
				array(
					"Projeto de Arquitetura e suas Fases",
					"Projetos Complementares: Instalações Elétricas, Iluminação e Telefonia",
					"Projetos Complementares: Instalações Hidro-sanitárias",
					"Sistemas Construtivos",
					"Topografia",
					"Temas Tecnológicos em Projetos de uma Edificação",
					"Estudos de Caso em Humanidades e Meio Ambiente"
				),
				array(
					"Projeto Estrutural e Execução de Fundações",
					"Técnicas de Execução das Instalações",
					"Técnicas de Execução de Supra-estruturas",
					"Técnicas e Tipos de Vedações e Esquadrias",
					"Tipos e Técnicas de Execução de Coberturas",
					"Temas Tecnológicos em Execução de uma Obra",
					"Estudos de Caso em Matemática Aplicada"
				),
				array(
					"Equipamentos de Obras e Segurança de Trabalho Aplicado",
					"Orçamentos de Obras",
					"Plano de Execução da Obra - Aspectos Administrativos",
					"Projeto e Organização do Canteiro e a Locação de Obra",
					"Técnicas e Tipos de Acabamentos",
					"Temas Tecnológicos em Preparação de uma Obra",
					"Estudos de Caso em Gestão de Equipes"
				),
				array(
					"Análise da Viabilidade de Empreendimentos",
					"Logística Aplicada a Construção",
					"Práticas Jurídicas Aplicadas",
					"Sistemas de Informação Aplicados",
					"Técnicas de Planejamento de Empreendimentos",
					"Temas Tecnológicos em Planejamento de uma Obra",
					"Estudos de Caso em Processos e Operações"
				),
				array(
					"Comunicação Empresarial",
					"Empreendedorismo",
					"Gestão do Capital Humano",
					"Marketing",
					"Práticas de Negociação",
					"Temas Tecnológicos em Gerenciamento de uma Obra",
					"Estudos de Caso em Construção de Edifícios"
				)
			)
		),
		"direito" => array(
			"title" => "Direito",
			"coordinator" => array(
				"name" => "Davi José de Souza da Silva",
				"email" => "dsilva4@faculdadeideal.edu.br"
			),
			"subjects" => array(
				array(
					"Ciência Política e Teoria do Estado",
					"Filosofia e Direito",
					"Humanidades em Direito",
					"Introdução ao Estudo do Direito",
					"Redação e Linguagem Jurídica"
				),
				array(
					"Direito Civil - Parte Geral",
					"Direito Penal - Teoria do Crime",
					"Hermenêutica Jurídica",
					"Teoria Constitucional e Direitos Fundamentais",
					"Teoria Geral do Processo"
				),
				array(
					"Direito Civil - Obrigações",
					"Direito Constitucional - Organização Estatal",
					"Direito Penal - Teoria da Pena",
					"Direitos Humanos",
					"Processo Civil - Conhecimento",
					"Componente de Flexibilização Curricular I",
					"Estudos Interdisciplinares em Direito I"
				),
				array(
					"Direito Civil - Contrato",
					"Direito Penal - Especial",
					"Ordem Tributária",
					"Processo Civil - Recursos",
					"Teoria do Direito Administrativo",
					"Componente de Flexibilização Curricular II",
					"Estudos Interdisciplinares em Direito II"
				),
				array(
					"Direito Administrativo Aplicado",
					"Direito Civil - Coisas",
					"Direito Penal - Extravagante",
					"Processo Civil - Execução",
					"Tributos",
					"Componente de Flexibilização Curricular III",
					"Estudos Interdisciplinares em Direito III"
				),
				array(
					"Direito Civil - Família",
					"Direito do Trabalho",
					"Processo Civil - Procedimentos Especiais",
					"Processo Constitucional",
					"Processo Penal - Teoria Geral",
					"Componente de Flexibilização Curricular IV",
					"Estudos Interdisciplinares em Direito IV"
				),
				array(
					"Direito Civil - Sucessões",
					"Direito das Cidades - Urbanístico e Ambiental",
					"Direito Empresarial - Teoria Geral",
					"Ordem Trabalhista",
					"Processo Penal Aplicado",
					"Estágio Supervisionado I - Direito",
					"Componente de Flexibilização Curricular V",
					"Estudos Interdisciplinares em Direito V"
				),
				array(
					"Direito do Consumidor",
					"Direito Empresarial Aplicado",
					"Direito Internacional Privado e Público",
					"Ética Geral e Jurídica",
					"Processo do Trabalho",
					"Estágio Supervisionado II - Direito",
					"Componente de Flexibilização Curricular VI",
					"Estudos Interdisciplinares em Direito VI"
				),
				array(
					"Legislação Especial",
					"Prática Civil",
					"Prática Penal",
					"Prática Trabalhista",
					"Responsabilidade Civil",
					"Trabalho de Conclusão de Curso - TCC I - Direito",
					"Estágio Supervisionado III - Direito",
					"Componente de Flexibilização Curricular VII",
					"Estudos Interdisciplinares em Direito VII"
				),
				array(
					"Direito Previdenciário",
					"Economia e Direito",
					"Interdisciplinariedade e Direito",
					"Mediação e Arbitragem",
					"Psicologia e Criminologia",
					"Trabalho de Conclusão de Curso - TCC II - Direito",
					"Estágio Supervisionado IV - Direito",
					"Componente de Flexibilização Curricular VIII",
					"Estudos Interdisciplinares em Direito VIII"
				)
			)
		),
		"engenharia-ambiental-e-sanitaria" => array(
			"title" => "Engenharia Ambiental e Sanitária",
			"coordinator" => array(
				"name" => "Bianca Oliveira Fernandez",
				"email" => ""
			),
			"subjects" => array(
				array(
					"Algoritmos Computacionais",
					"Cálculo Instrumental",
					"Geometria Analítica",
					"Metodologia da Pesquisa",
					"Química Aplicada à Engenharia"
				),
				array(
					"Álgebra Linear",
					"Cálculo Aplicado",
					"Desenho Aplicado a Engenharia",
					"Dinâmica",
					"Língua Portuguesa"
				),
				array(
					"Ciência dos Materiais",
					"Eletricidade e Magnetismo",
					"Equações Diferenciais",
					"Estatística",
					"Fenômenos Oscilatórios e Termodinâmica"
				),
				array(
					"Cálculo Numérico",
					"Carreira, Liderança e Trabalho em Equipe",
					"Ciências Humanas e Sociais",
					"Eletricidade Aplicada",
					"Resistência dos Materiais"
				),
				array(
					"Biologia Aplicada",
					"Fenômenos de Transportes",
					"Geologia Ambiental",
					"Legislação, Dano e Perícia Ambiental",
					"Química e Tecnologia Orgânica"
				),
				array(
					"Ecologia Aplicada",
					"Geoprocessamento",
					"Hidráulica Aplicada",
					"Hidrologia Aplicada",
					"Microbiologia Ambiental"
				),
				array(
					"Gerenciamento de Riscos Ambientais",
					"Gestão Integrada de Resíduos Sólidos",
					"Metodologia de Produção Limpa",
					"Modelagem Matemática de Sistemas Ambientais",
					"Projeto: Esgotamento Sanitário e Tratamento"
				),
				array(
					"Gestão de Recursos Hídricos",
					"Operações Unitárias de Processos Químicos",
					"Processo de Produção Química",
					"Termodinâmica Aplicada",
					"Tratamento de Água e Efluentes"
				),
				array(
					"Avaliação dos Impactos Ambientais",
					"Economia Ambiental",
					"Gestão Empresarial",
					"Planejamento, Auditoria e Gestão Ambiental",
					"Projeto: Abastecimento e Tratamento de Água"
				),
				array(
					"Manejo de Recursos Naturais",
					"Poluição Ambiental",
					"Recuperação de Áreas Degradadas",
					"Rede de Monitoramento: Ar, Água e Solo",
					"Saneamento"
				)
			)
		),
		"engenharia-civil" => array(
			"title" => "Engenharia Civil",
			"coordinator" => array(
				"name" => "Profª. Bianca Oliveira Fernandez",
				"email" => "bfernandez2@faculdadeideal.edu.br"
			),
			"subjects" => array(
				array(
					"Algoritmos Computacionais",
					"Cálculo Instrumental",
					"Geometria Analítica",
					"Metodologia da Pesquisa",
					"Química Aplicada à Engenharia"
				),
				array(
					"Álgebra Linear",
					"Cálculo Aplicado",
					"Desenho Aplicado a Engenharia",
					"Dinâmica",
					"Língua Portuguesa"
				),
				array(
					"Cálculo Numérico",
					"Cálculo Vetorial",
					"Estatística",
					"Fenômenos Oscilatórios e Termodinâmica",
					"Geologia Aplicada"
				),
				array(
					"Ciência dos Materiais da Construção Civil",
					"Desenho Aplicado a Engenharia Civil",
					"Eletricidade e Magnetismo",
					"Equações Diferenciais",
					"Mecânica Geral"
				),
				array(
					"Ciências do Ambiente",
					"Eletricidade Aplicada",
					"Fenômenos de Transportes",
					"Materiais de Construção Civil",
					"Resistência dos Materiais"
				),
				array(
					"Ciências Humanas e Sociais",
					"Hidráulica Aplicada",
					"Instalações Elétricas Prediais, Iluminação e Telefonia",
					"Princípios Básicos da Mecânica dos Solos",
					"Resistência dos Materiais Aplicada"
				),
				array(
					"Aço e Madeira",
					"Instalações Hidro-sanitárias",
					"Projetos de Estradas",
					"Tecnologia das Construções",
					"Tópicos Especiais em Concreto Armado"
				),
				array(
					"Carreira, Liderança e Trabalho em Equipe",
					"Comportamento Mecânico dos Solos",
					"Hidrologia Aplicada",
					"Noções de Direito",
					"Teoria das Estruturas"
				),
				array(
					"Abastecimento de Águas",
					"Barragens e Contenções de Terra",
					"Gerenciamento das Construções",
					"Gestão de Obras",
					"Higiene e Segurança no Trabalho"
				),
				array(
					"Análise das Estruturas",
					"Concreto Armado",
					"Fundações",
					"Saneamento",
					"Topografia"
				)
			)
		),
		"engenharia-de-controle-de-automacao" => array(
			"title" => "Engenharia de Controle de Automação",
			"coordinator" => array(
				"name" => "Profª Bianca Oliveira Fernandez",
				"email" => "bfernandez2@faculdadeideal.edu.br"
			),
			"subjects" => array(
				array(
					"Algoritmos Computacionais",
					"Cálculo Instrumental",
					"Geometria Analítica",
					"Metodologia da Pesquisa",
					"Química Aplicada à Engenharia"
				),
				array(
					"Álgebra Linear",
					"Cálculo Aplicado",
					"Desenho Aplicado a Engenharia",
					"Dinâmica",
					"Língua Portuguesa"
				),
				array(
					"Eletricidade e Magnetismo",
					"Eletrônica Digital",
					"Equações Diferenciais",
					"Fenômenos Oscilatórios e Termodinâmica",
					"Linguagem de Programação"
				),
				array(
					"Arquitetura de Computadores",
					"Cálculo Vetorial",
					"Circuitos Elétricos",
					"Desenho Mecânico",
					"Materiais Elétricos"
				),
				array(
					"Análise de Circuitos",
					"Análise de Sistemas Lineares",
					"Princípios de Eletrônica",
					"Programação Orientada a Objetos",
					"Resistência dos Materiais"
				),
				array(
					"Automação Industrial",
					"Cálculo Numérico",
					"Eletrônica de Potência",
					"Fenômenos de Transportes",
					"Microcontroladores"
				),
				array(
					"Ciências do Ambiente",
					"Comando Numérico Computadorizado",
					"Economia Empresarial",
					"Processamento Digital de Sinais",
					"Sistemas Discretos"
				),
				array(
					"Automação Hidráulica/Pneumática",
					"Controle de Processos",
					"Conversão de Energia",
					"Processos de Fabricação Mecânica",
					"Robótica"
				),
				array(
					"Carreira, Liderança e Trabalho em Equipe",
					"Ciências Humanas e Sociais",
					"Gestão Empresarial",
					"Instalações e Projetos Elétricos",
					"Redes Industriais"
				),
				array(
					"Automação Eletro-eletrônica",
					"Controle Digital",
					"Estatística",
					"Instrumentação e Automação",
					"Inteligência Artificial"
				)
			)
		),
		"engenharia-de-producao" => array(
			"title" => "Engenharia de Produção",
			"coordinator" => array(
				"name" => "Profª Bianca Oliveira Fernandez",
				"email" => "bfernandez2@faculdadeideal.edu.br"
			),
			"subjects" => array(
				array(
					"Algoritmos Computacionais",
					"Cálculo Instrumental",
					"Geometria Analítica",
					"Metodologia da Pesquisa",
					"Química Aplicada à Engenharia"
				),
				array(
					"Álgebra Linear",
					"Cálculo Aplicado",
					"Desenho Aplicado a Engenharia",
					"Dinâmica",
					"Língua Portuguesa"
				),
				array(
					"Cálculo Numérico",
					"Ciência dos Materiais",
					"Ciências do Ambiente",
					"Estatística",
					"Resistência dos Materiais"
				),
				array(
					"Administração da Produção",
					"Eletricidade e Magnetismo",
					"Equações Diferenciais",
					"Informática Aplicada",
					"Organização do Trabalho"
				),
				array(
					"Engenharia Econômica",
					"Fenômenos de Transportes",
					"Pesquisa Operacional",
					"Produtividade e Decisão",
					"Técnicas Aplicadas a Produção"
				),
				array(
					"Ciências Humanas e Sociais",
					"Eletricidade Aplicada",
					"Empreendedorismo",
					"Fenômenos Oscilatórios e Termodinâmica",
					"Métodos Estatísticos Aplicados"
				),
				array(
					"Carreira, Liderança e Trabalho em Equipe",
					"Economia Empresarial",
					"Segurança, Saúde, Higiene do Trabalho e Meio Ambiente",
					"Simulações Empresariais",
					"Sistemas de Informações Gerenciais"
				),
				array(
					"Administração Financeira e Orçamentária",
					"Gestão de Projetos",
					"Logística Empresarial",
					"Planejamento e Gestão da Manutenção",
					"Planejamento e Projeto de Produtos"
				),
				array(
					"Automação de Sistemas Produtivos",
					"Concepção Ergonômica",
					"Planejamento e Controle da Produção",
					"Processos de Fabricação Mecânica",
					"Processos de Produção Química"
				),
				array(
					"Contabilidade Empresarial",
					"Gestão Estratégica",
					"Marketing Empresarial",
					"Planejamento e Gestão da Qualidade",
					"Técnicas de Simulação e Otimização"
				)
			)
		),
		"engenharia-eletrica" => array(
			"title" => "Engenharia Elétrica",
			"coordinator" => array(
				"name" => "Profª Bianca Oliveira Fernandez",
				"email" => "bfernandez2@faculdadeideal.edu.br"
			),
			"subjects" => array(
				array(
					"Algoritmos Computacionais",
					"Cálculo Instrumental",
					"Geometria Analítica",
					"Metodologia da Pesquisa",
					"Química Aplicada à Engenharia"
				),
				array(
					"Álgebra Linear",
					"Cálculo Aplicado",
					"Desenho Aplicado a Engenharia",
					"Dinâmica",
					"Língua Portuguesa"
				),
				array(
					"Eletricidade e Magnetismo",
					"Equações Diferenciais",
					"Estatística",
					"Fenômenos Oscilatórios e Termodinâmica",
					"Linguagem de Programação"
				),
				array(
					"Cálculo Numérico",
					"Cálculo Vetorial",
					"Circuitos Elétricos",
					"Materiais Elétricos",
					"Princípios de Eletrônica"
				),
				array(
					"Análise de Circuitos",
					"Eletromagnetismo",
					"Eletrônica Analógica",
					"Eletrônica Digital",
					"Resistência dos Materiais"
				),
				array(
					"Análise de Sistemas Lineares",
					"Carreira, Liderança e Trabalho em Equipe",
					"Conversão de Energia",
					"Fenômenos de Transportes",
					"Introdução aos Sistemas de Potência"
				),
				array(
					"Aplicação e Acionamentos de Máquinas",
					"Controle Digital",
					"Microcontroladores",
					"Projetos Elétricos Industriais",
					"Transmissão de Energia Elétrica"
				),
				array(
					"Análise de Sistemas de Potência",
					"Ciências Humanas e Sociais",
					"Distribuição de Energia Elétrica",
					"Eletrônica de Potência",
					"Máquinas Elétricas"
				),
				array(
					"Ciências do Ambiente",
					"Eficiência Energética e Qualidade de Energia",
					"Geração de Energia Térmica e Renovável",
					"Gestão Empresarial",
					"Instrumentação e Automação"
				),
				array(
					"Controle de Processos",
					"Economia Empresarial",
					"Geração Hidráulica e Planejamento Energético",
					"Instalações e Projetos Elétricos",
					"Proteção de Sistemas Elétricos"
				)
			)
		),
		"engenharia-mecanica" => array(
			"title" => "Engenharia Mecânica",
			"coordinator" => array(
				"name" => "Profª Bianca Oliveira Fernandez",
				"email" => "bfernandez2@faculdadeideal.edu.br"
			),
			"subjects" => array(
				array(
					"Algoritmos Computacionais",
					"Cálculo Instrumental",
					"Geometria Analítica",
					"Metodologia da Pesquisa",
					"Química Aplicada à Engenharia"
				),
				array(
					"Álgebra Linear",
					"Cálculo Aplicado",
					"Desenho Aplicado a Engenharia",
					"Dinâmica",
					"Língua Portuguesa"
				),
				array(
					"Ciência dos Materiais",
					"Ciências do Ambiente",
					"Eletricidade e Magnetismo",
					"Equações Diferenciais",
					"Sistemas Mecânicos Estáticos"
				),
				array(
					"Cálculo Vetorial",
					"Desenho Mecânico",
					"Eletricidade Aplicada",
					"Estatística",
					"Sistemas Mecânicos Dinâmicos"
				),
				array(
					"Ciências Humanas e Sociais",
					"Dinâmica Avançada",
					"Oscilações e Vibrações",
					"Resistência dos Materiais",
					"Termodinâmica"
				),
				array(
					"Elementos Mecânicos de União",
					"Fenômenos de Transportes",
					"Processos Metalúrgicos",
					"Projetos de Controle e Automação",
					"Transferência de Calor e Massa"
				),
				array(
					"Elementos Finitos",
					"Flexibilidade e Suportação",
					"Gestão Empresarial",
					"Máquinas Térmicas e Processos Contínuos",
					"Sistemas de Refrigeração"
				),
				array(
					"Cálculo de Estruturas e Tubulações Industriais",
					"Elementos Mecânicos de Transmissão e Rolamento",
					"Máquinas Hidráulicas",
					"Mecânica dos Sólidos Avançada",
					"Processos de Fabricação Mecânica"
				),
				array(
					"Engenharia Auxiliada Por Computador (cae)",
					"Equipamentos Estáticos",
					"Motores de Combustão Interna",
					"Planejamento de Produção e Manutenção",
					"Projeto Integrado de Engenharia"
				),
				array(
					"Cálculo Numérico",
					"Carreira, Liderança e Trabalho em Equipe",
					"Economia Empresarial",
					"Máquinas de Elevação e Movimentação",
					"Sistemas Automotivos"
				)
			)
		),
		"gestao-ambiental" => array(
			"title" => "Gestão Ambiental",
			"coordinator" => array(
				"name" => "",
				"email" => ""
			),
			"subjects" => array(
				array(
					"Cenário Micro e Macro Econômico",
					"Estatística",
					"Gestão Empresarial",
					"Língua Portuguesa",
					"Psicologia Aplicada",
					"Temas Tecnológicos em Fundamentos de Gestão",
					"Estudos de Caso em Carreira e Empreendedorismo"
				),
				array(
					"Análise de Impactos Ambientais",
					"Controladoria Ambiental",
					"Estudos Hidrológicos",
					"Monitoramento e Qualidade Ambiental",
					"Recomposição de Áreas Degradadas",
					"Temas Tecnológicos em Análise de Impactos Ambientais",
					"Estudos de Caso em Humanidades e Meio Ambiente"
				),
				array(
					"Direito Ambiental",
					"Ecoempreendedorismo",
					"Economia de Negócios",
					"Gestão da Produção Limpa",
					"Planejamento dos Recursos Ambientais",
					"Temas Tecnológicos em Gestão de Projetos Ambientais",
					"Estudos de Caso em Gestão Ambiental"
				),
				array(
					"Administração de Riscos Ambientais",
					"Administração dos Recursos Hídricos",
					"Gerenciamento de Recursos Energéticos",
					"Gestão de Abastecimento de Água e Esgotamento Sanitário",
					"Gestão de Resíduos Sólidos",
					"Temas Tecnológicos em Meio Ambiente e Gestão de Recursos",
					"Estudos de Caso em Matemática Aplicada"
				)
			)
		),
		"gestao-de-rh" => array(
			"title" => "Gestão de RH",
			"coordinator" => array(
				"name" => "",
				"email" => ""
			),
			"subjects" => array(
				array(
					"Cenário Micro e Macro Econômico",
					"Estatística",
					"Gestão Empresarial",
					"Língua Portuguesa",
					"Psicologia Aplicada",
					"Temas Tecnológicos em Fundamentos de Gestão",
					"Estudos de Caso em Carreira e Empreendedorismo"
				),
				array(
					"Cultura e Comportamento Organizacional",
					"Gestão de Serviços",
					"Gestão Estratégica",
					"Meio Ambiente e Sustentabilidade",
					"Recrutamento e Seleção Por Competência",
					"Temas Tecnológicos em Recrutamento e Seleção Por Competência",
					"Estudos de Caso em Humanidades e Meio Ambiente"
				),
				array(
					"Auditoria de Recursos Humanos",
					"Avaliação de Desempenho",
					"Dinâmicas e Jogos Vivenciais",
					"Legislação Social do Trabalho",
					"Sistema de Remuneração Por Competência",
					"Temas Tecnológicos em Gestão da Remuneração Por Competência",
					"Estudos de Caso em Gestão de Recursos Humanos"
				),
				array(
					"Carreira, Liderança e Trabalho em Equipe",
					"Desenvolvimento Gerencial",
					"Empreendedorismo",
					"Rotinas de Departamento Pessoal",
					"Treinamento e Desenvolvimento Por Competência",
					"Temas Tecnológicos em Desenvolvimento de Competências",
					"Estudos de Caso em Matemática Aplicada"
				)
			)
		),
		"gestao-financeira" => array(
			"title" => "Gestão Financeira",
			"coordinator" => array(
				"name" => "Profº. Mário Augusto da Silva Botelho",
				"email" => "mbotelho@faculdadeideal.edu.br"
			),
			"subjects" => array(
				array(
					"Cenário Micro e Macro Econômico",
					"Estatística",
					"Gestão Empresarial",
					"Língua Portuguesa",
					"Psicologia Aplicada",
					"Temas Tecnológicos em Fundamentos de Gestão",
					"Estudos de Caso em Carreira e Empreendedorismo"
				),
				array(
					"Contabilidade Geral - Introdutória",
					"Cultura e Comportamento Organizacional",
					"Gestão de Serviços",
					"Gestão Estratégica",
					"Meio Ambiente e Sustentabilidade",
					"Temas Tecnológicos em Gestão de Fluxo de Caixa",
					"Estudos de Caso em Humanidades e Meio Ambiente"
				),
				array(
					"Controladoria",
					"Formação de Preço e Custos",
					"Gestão Financeira",
					"Mercado de Capitais",
					"Planejamento e Controle Financeiro",
					"Temas Tecnológicos em Mercados e Planejamento Financeiro",
					"Estudos de Caso em Gestão Financeira"
				),
				array(
					"Análise de Investimentos",
					"Carreira, Liderança e Trabalho em Equipe",
					"Empreendedorismo",
					"Gestão Tributária",
					"Matemática Financeira",
					"Temas Tecnológicos em Controladoria",
					"Estudos de Caso em Matemática Aplicada"
				)
			)
		),
		"seguranca-da-informacao" => array(
			"title" => "Segurança da Informação",
			"coordinator" => array(
				"name" => "Iranildo Ramos da Encarnação",
				"email" => "iencarnacao@faculdadeideial.edu.br"
			),
			"subjects" => array(
				array(
					"Algoritmos Computacionais",
					"Cálculo",
					"Carreira, Liderança e Trabalho em Equipe",
					"Empreendedorismo",
					"Informática e Sociedade",
					"Temas Tecnológicos em Humanidades",
					"Estudos de Caso em Carreira e Empreendedorismo"
				),
				array(
					"Estatística",
					"Introdução à Informática",
					"Matemática Básica",
					"Metodologia da Pesquisa",
					"Programação Orientada a Objetos",
					"Temas Tecnológicos em Raciocínio Lógico e Matemático",
					"Estudos de Caso em Humanidades e Meio Ambiente"
				),
				array(
					"Roteadores",
					"Segurança e Auditoria",
					"Segurança na Web",
					"Sistemas Computacionais para Programadores",
					"Switches",
					"Temas Tecnológicos em Segurança Digital",
					"Estudos de Caso em Hacking Ético"
				),
				array(
					"Laboratório de Redes - Código Livre",
					"Métodos Criptográficos",
					"Privacidade e Segurança de Dados",
					"Segurança Avançada de Redes",
					"Testes de Seguranças de Redes",
					"Temas Tecnológicos em Segurança de Sistemas de Informação",
					"Estudos de Caso em Segurança de Dispositivos Móveis"
				),
				array(
					"Bancos de Dados",
					"Estrutura de Dados",
					"Laboratório de Banco de Dados",
					"Laboratório de Redes",
					"Redes de Computadores",
					"Temas Tecnológicos em Infraestrutura Tecnológica",
					"Estudos de Caso em Matemática Aplicada"
				),
			)
		)
		/*"administracao" => array(
			"title" => "Administração",
			"coordinator" => array(
				"name" => "",
				"email" => ""
			),
			"subjects" => array(
				array(
					"",
					"",
					"",
					"",
					""
				),
			)
		)*/
	);
	
	return $courses;
	
}

?>