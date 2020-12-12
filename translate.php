<?php


/* ----- PT-BR ----- */

#index.php
	
	$_SESSION['pt-br']['Welcome to the Risk Management System'] 						= "Bem vindo ao Sistema de Gestão de Riscos";	
	
#header.php
	
	$_SESSION['pt-br']['Welcome'] 						= "Bem vindo";
	$_SESSION['pt-br']['Project selected'] 				= "Projeto selecionado";
	$_SESSION['pt-br']['Change to'] 					= "Mudar para";
	$_SESSION['pt-br']['select'] 						= "selecione";
	$_SESSION['pt-br']['change'] 						= "mudar para";
	$_SESSION['pt-br']['language'] 						= "idioma";
	$_SESSION['pt-br']['portuguese'] 					= "português";
	$_SESSION['pt-br']['english'] 						= "inglês";
	$_SESSION['pt-br']['new project'] 					= "novo projeto";

#ec_documents.php
	$_SESSION['pt-br']['Titulo'] 						= "Titulo";
	$_SESSION['pt-br']['Report Documents'] 				= "Relatorio de documentos";
	$_SESSION['pt-br']['Register a new document'] 		= "Cadastrar documento";
	$_SESSION['pt-br']['Name'] 							= "Nome";
	$_SESSION['pt-br']['Link'] 							= "Link";
	$_SESSION['pt-br']['File'] 							= "Arquivo";
	$_SESSION['pt-br']['Status'] 						= "Status";
	$_SESSION['pt-br']['Action'] 						= "Ações";
	$_SESSION['pt-br']['active'] 						= "ativo";
	$_SESSION['pt-br']['click to disable'] 				= "clique para desativar";
	$_SESSION['pt-br']['inactive'] 						= "inativo";
	$_SESSION['pt-br']['click to activate'] 			= "clique para ativar";
	$_SESSION['pt-br']['Edit'] 							= "Edit";
	$_SESSION['pt-br']['Comment'] 						= "Observação";
	
#analyze_graphs.php
	$_SESSION['pt-br']['Risk Graphs'] 								= "Gráficos de Risco";
	$_SESSION['pt-br']['Use the Value Pie, then sort by'] 			= "Classifique pelo formta de torta";
	$_SESSION['pt-br']['By Agent, Type'] 							= "Por agente";
	$_SESSION['pt-br']['By Magnitude of Risk'] 						= "Por magnitude de risco";
	$_SESSION['pt-br']['By Frequency or Rate'] 						= "Por frenquencia ou taxa";
	$_SESSION['pt-br']['By Loss to Each Item Affected'] 			= "Por perda de cada item afetado";
	$_SESSION['pt-br']['By Items Affected'] 						= "Por itens afetados";
	$_SESSION['pt-br']['Consider all items equal, then sort by']	= "Considerando todos os itens iguais";	
	$_SESSION['pt-br']['Time horizon'] 								= "Horizonte de tempo";
	$_SESSION['pt-br']['Risk Totals For Agents'] 					= "Total de riscos por agentes";
	$_SESSION['pt-br']['Frequency / Rate'] 							= "Frenquencia / Taxa (A)";
	$_SESSION['pt-br']['Loss to object'] 							= "Perda para objetos (B)";
	$_SESSION['pt-br']['Collection affected'] 						= "Coleção afetada (C)";
	

#analyze_options.php
	$_SESSION['pt-br']['Analyze Options'] 						= "Opções de análise";
	$_SESSION['pt-br']['Risk'] 									= "Risco";
	$_SESSION['pt-br']['select'] 								= "selecione";
	$_SESSION['pt-br']['Options'] 								= "Opções";
	$_SESSION['pt-br']['Frequency o Rate (A)'] 					= "Frequencia ou Taxa (A)";
	$_SESSION['pt-br']['Loss to each item (B)'] 				= "Perda para cada item(B)";
	$_SESSION['pt-br']['Items Affected(C)'] 					= "Itens afetados(C)";
	$_SESSION['pt-br']['Magnitude of Risk']						= "Magnitude do Risco";	
	$_SESSION['pt-br']['Low'] 									= "Baixa";
	$_SESSION['pt-br']['Probable'] 								= "Provável";
	$_SESSION['pt-br']['High'] 									= "Alta";
	$_SESSION['pt-br']['Uncertainty range'] 					= "Faixa de incerteza";
	$_SESSION['pt-br']['Expected Scores (average)'] 			= "Pontuações esperadas";
	$_SESSION['pt-br']['Frequency or Rate'] 					= "Frequencia ou Taxa";
	$_SESSION['pt-br']['Loss to each item affected'] 			= "Perda para cada item";
	$_SESSION['pt-br']['Items affected'] 						= "Itens afetados";
	
#analyze_risks.php
	$_SESSION['pt-br']['Analyze Risks'] 						= "Analise de riscos";
	$_SESSION['pt-br']['Name'] 									= "Nome";
	$_SESSION['pt-br']['select'] 								= "selecione";
	$_SESSION['pt-br']['Agent'] 								= "Agente";
	$_SESSION['pt-br']['Description'] 							= "Descrição";	
	$_SESSION['pt-br']['Log triangle distribution (default)'] 	= "Distribuição do triângulo de log (padrão)";
	$_SESSION['pt-br']['Linear triangle distribution'] 			= "Distribuição linear do triângulo";
	$_SESSION['pt-br']['Simple use of problable value'] 			= "Uso simples de valor provável";
	$_SESSION['pt-br']['Type of calculation used for expected values (used for the risk and any associated options)'] 			= "Tipo de cálculo usado para os valores esperados (usado para o risco e quaisquer opções associadas)";
	$_SESSION['pt-br']['Save'] 									= "Salvar";
	
#analyze_risks_frequency_or_rate.php 
	$_SESSION['pt-br']['Risk Name'] 																= "Nome do risco";
	$_SESSION['pt-br']['Time horizon, years'] 														= "Horizonte de tempo, em anos";
	$_SESSION['pt-br']['Select the type risk']														= "Selecione o tipo de risco";
	$_SESSION['pt-br']['Event, rare (time between events greater than time horizon)'] 				= "Evento, raro (tempo entre eventos maior que o horizonte de tempo)";
	$_SESSION['pt-br']['Event, frequent (must be at least one year between events)'] 				= "Evento, frequente (deve haver pelo menos um ano entre eventos)";
	$_SESSION['pt-br']['Process or cumulative events, analysed over a particular period of time'] 	= "Eventos de processo ou cumulativos, analisados ao longo de um determinado período de tempo";
	$_SESSION['pt-br']['Process or cumulative events, analyzed at the time horizon'] 				= "Eventos de processo ou cumulativos, analisados no horizonte de tempo";
	$_SESSION['pt-br']['Process or cumulative events, analyzed at a particular stage of damage'] 	= "Processos ou eventos cumulativos, analisados em um estágio específico de dano";
	$_SESSION['pt-br']['Not selected yet']															= "Ainda não selecionado";
	$_SESSION['pt-br']['How often will the event occur?'] 											= "Com que frequência o evento ocorrerá?";
	$_SESSION['pt-br']['Explain your estimates for frequency or rate'] 								= "Explique suas estimativas de frequência ou taxa";
	$_SESSION['pt-br']['Zoom explanation and notes'] 												= "Explicação e notas do zoom";
	$_SESSION['pt-br']['Low estimate of years'] 													= "Estimativa baixa de anos";
	$_SESSION['pt-br']['Average time period between events, years'] 								= "Período médio de tempo entre eventos, em anos";
	$_SESSION['pt-br']['High estimate of years'] 													= "Alta estimativa de anos";
	$_SESSION['pt-br']['Analysis notes and documents (A)'] 											= "Análise de notas e documentos";
	$_SESSION['pt-br']['Explain your estimates for frequency or rate'] 								= "Explique suas estimativas de frequência ou taxa";
	$_SESSION['pt-br']['Notes for this explanation'] 												= "Notas para esta explicação";
	$_SESSION['pt-br']['Documents associated with this risk its options'] 							= "Documentos associados a este risco com suas opções";
	$_SESSION['pt-br']['Document name'] 															= "Nome do documento";
	$_SESSION['pt-br']['Comment'] 																	= "Comente";
	$_SESSION['pt-br']['External Link'] 															= "Link externo";
	$_SESSION['pt-br']['or Document link'] 															= "ou link para documento";
	$_SESSION['pt-br']['Close'] 																	= "Fechar";
	$_SESSION['pt-br']['Save changes'] 																= "Salvar alterações";
	$_SESSION['pt-br']['Register save successfull'] 												= "Registro realizado com sucesso";
	$_SESSION['pt-br']['How often will the event occur?'] 											= "Com que frequência o evento ocorrerá?";
	$_SESSION['pt-br']['How soon will the process cause the specified loss?'] 						= "Em quanto tempo o processo causará a perda especificada?";
	$_SESSION['pt-br']['Most probable time period between events, years'] 							= "Período de tempo mais provável entre eventos, em anos";
	$_SESSION['pt-br']['Average time period between events (must be more than 1 year)'] 			= "Período médio de tempo entre eventos (deve ser mais de 1 ano)";
	$_SESSION['pt-br']['This time period has been selected for analysis of the loss to each item affected'] = "Este período de tempo foi selecionado para análise da perda de cada item afetado";
	$_SESSION['pt-br']['A particular loss to each item affected was selected for analysis, this is the estimate of years required to reach that loss'] = "Uma perda específica para cada item afetado foi selecionada para análise, esta é a estimativa de anos necessários para atingir essa perda";
	
	$_SESSION['pt-br']['Most probable time period between events, (must be more than 1 year)'] = "Most probable time period between events, (must be more than 1 year)";
	$_SESSION['pt-br']['Probable loss to each item affected']												= "Probable loss to each item affected";
	
	$_SESSION['pt-br']['The time horizon has been selected and entered automatically'] = "The time horizon has been selected and entered automatically";
	
#analyze_risks_frequency_or_rate.php 	
	$_SESSION['eng']['Option summary sentence'] 												= "Opção de resumo";
	$_SESSION['eng']['Capital (one time) cost'] 												= "Custo de capital (uma vez)";
	$_SESSION['eng']['Annual (maint.) cost'] 													= "Custo anual (manutenção)";
	$_SESSION['eng']['Date implemented'] 														= "Data de implementação";


	
#analyze_risks_items_affecteds.php.php 	
	$_SESSION['pt-br']['This score must be less than or equal to the Expected score. It cannot be changed if the Expected score is empty']																		= "Essa pontuação deve ser menor ou igual à pontuação esperada. Não pode ser alterado se a pontuação esperada estiver vazia";
	
	$_SESSION['pt-br']['Uncertainty range']											= "Faixa de incerteza";
	$_SESSION['pt-br']['Explain the estimates of items affected']					= "Explain the estimates of items affected";
	
	$_SESSION['pt-br']['What fraction of the value will be affected?']				= "Qual fração do valor será afetada?";
	
	$_SESSION['pt-br']['Explain your estimates for frequency or rate']				= "Explique suas estimativas de frequência ou taxa";
	
	$_SESSION['pt-br']['Zoom explanation and notes']									= "Explicação e notas do zoom";
	
	$_SESSION['pt-br']['Select how this score will be entered:']						= "Selecione como essa pontuação será inserida:";
	
	$_SESSION['pt-br']['Step scale, considering the heritage asset as a whole.']		= "Escala de etapas, considerando o patrimônio como um todo.";
	
	$_SESSION['pt-br']['More precise data using the value pie']						= "Dados mais precisos usando a pizza de valor";
	
	$_SESSION['pt-br']['High estimate']												= "Estimativa alta";
	
	$_SESSION['pt-br']['Select']														= "Selecione";
	
	$_SESSION['pt-br']['All or most of the whole asset value']						= "Todo ou quase todo o valor do ativo";
	
	$_SESSION['pt-br']['A large fraction of the whole asset value']					= "Uma grande fração de todo o valor do ativo";
	
	$_SESSION['pt-br']['Between large and small fraction of the whole asset value']	= "Entre grande e pequena fração de todo o valor do ativo";
	
	$_SESSION['pt-br']['A small fraction of the whole asset value']					= "Uma pequena fração de todo o valor do ativo";
	
	$_SESSION['pt-br']['Between small and tiny fraction of the whole asset value']	= "Entre pequena e minúscula fração de todo o valor do ativo";

	$_SESSION['pt-br']['Between small and tiny fraction of the whole asset value']	= "Entre pequena e minúscula fração de todo o valor do ativo";
	
	$_SESSION['pt-br']['A tiny fraction of the whole asset value']					= "Uma pequena fração de todo o valor do ativo";
	
	$_SESSION['pt-br']['Between a tiny fraction and a trace of the whole asset value']	= "Entre uma pequena fração e um traço de todo o valor do ativo";
	
	$_SESSION['pt-br']['Less than a trace of the whole asset value but not zero']		= "Menos do que um traço de todo o valor do ativo, mas não zero";
	
	$_SESSION['pt-br']['All or most of the whole asset value'] 						= "Todo ou quase todo o valor do ativo";
	
	$_SESSION['pt-br']['Between most and a large fraction of the whole asset value']	= "Entre a maior parte e uma grande fração de todo o valor do ativo";
	
	$_SESSION['pt-br']['A large fraction of the whole asset value'] 					= "Uma grande fração de todo o valor do ativo";
	
	$_SESSION['pt-br']['Between large and small fraction of the whole asset value']	= "Entre grande e pequena fração de todo o valor do ativo";
	
	$_SESSION['pt-br']['A small fraction of the whole asset value'] 					= "Uma pequena fração de todo o valor do ativo";
	
	$_SESSION['pt-br']['Between small and tiny fraction of the whole asset value'] 	= "Entre pequena e minúscula fração de todo o valor do ativo";
	
	$_SESSION['pt-br']['A tiny fraction of the whole asset value'] 						= "Uma pequena fração de todo o valor do ativoe";
	
	$_SESSION['pt-br']['Between a tiny fraction and a trace of the whole asset value']	= "Entre uma pequena fração e um traço de todo o valor do ativo";
	
	$_SESSION['pt-br']['A trace of the whole asset value'] 								= "Um traço de todo o valor do ativo";
	
	$_SESSION['pt-br']['Less than a trace of the whole asset value but not zero'] 		= "Menos do que um traço de todo o valor do ativo, mas não zero";
	
	$_SESSION['pt-br']['Low estimate'] 													= "Estimativa baixa";
	
	$_SESSION['pt-br']['All or most of the whole asset value'] 							= "Todo ou quase todo o valor do ativoe";
	
	$_SESSION['pt-br']['Between most and a large fraction of the whole asset value'] 		= "Entre a maior parte e uma grande fração de todo o valor do ativo";
	
	$_SESSION['pt-br']['A large fraction of the whole asset value'] 						= "Uma grande fração de todo o valor do ativo";
	
	$_SESSION['pt-br']['Between large and small fraction of the whole asset value'] 		= "Entre grande e pequena fração de todo o valor do ativo";
	
	$_SESSION['pt-br']['A small fraction of the whole asset value'] 						= "Uma pequena fração de todo o valor do ativo";
	
	$_SESSION['pt-br']['Between small and tiny fraction of the whole asset value'] 		= "Entre pequena e minúscula fração de todo o valor do ativo";
	
	$_SESSION['pt-br']['A tiny fraction of the whole asset value'] 						= "Uma pequena fração de todo o valor do ativo";
	
	$_SESSION['pt-br']['Between a tiny fraction and a trace of the whole asset value'] 	= "Entre uma pequena fração e um traço de todo o valor do ativo";
	
	$_SESSION['pt-br']['A trace of the whole asset value'] 								= "Um traço de todo o valor do ativo";
	
	$_SESSION['pt-br']['Less than a trace of the whole asset value but not zero'] 		= "Menos do que um traço de todo o valor do ativo, mas não zero";
	
	$_SESSION['pt-br']['Zoom list of items affected'] 									= "Lista de zoom de itens afetados";
	
	$_SESSION['pt-br']['Analysis notes and documents'] 									= "Notas de análise e documentos";
	
	$_SESSION['pt-br']['Explain your estimates for items affecteds'] 					= "Explique suas estimativas para itens afetados";
	
	$_SESSION['pt-br']['Notes for this explanation'] 									= "Notas para esta explicação";
	
	$_SESSION['pt-br']['Documents associated with this risk its options'] 				= "Documentos associados a este risco suas opções";
	
	$_SESSION['pt-br']['Document name'] 												= "Nome do Documento";
	
	$_SESSION['pt-br']['Comment'] 														= "Comente";
	
	$_SESSION['pt-br']['Document file'] 												= "Arquivo de documento";
	
	$_SESSION['pt-br']['Original Risk'] 												= "Risco Original";
	
	$_SESSION['pt-br']['New register'] 													= "Novo cadastro";

	$_SESSION['pt-br']['Register'] 														= "Registro";
	
	$_SESSION['pt-br']['numbers of itens'] 												= "número de itens";
	
	$_SESSION['pt-br']['Most probable'] 													= "Mais provável";
	
	$_SESSION['pt-br']['High estimate'] 													= "Estimativa alta";
	
	$_SESSION['pt-br']['Low estimate'] 													= "Estimativa baixa";
	
	$_SESSION['pt-br']['Save changes & refresh calculation'] 								= "Salvar alterações e atualizar o cálculo";
	
	$_SESSION['pt-br']['Register save successfull'] 										= "Registro salvo com sucesso";


/* ----- ENGLISH ----- */

#index.php
	
	$_SESSION['eng']['Welcome to the Risk Management System'] 						= "Welcome to the Risk Management System";	

#ec_documents.php
	$_SESSION['eng']['Titulo'] 							= "Title";
	$_SESSION['eng']['Report Documents'] 				= "Report Documents";
	$_SESSION['eng']['Register a new document'] 		= "Register a new document";
	$_SESSION['eng']['Name'] 							= "Name";
	$_SESSION['eng']['Link'] 							= "Link";
	$_SESSION['eng']['File'] 							= "File";
	$_SESSION['eng']['Status'] 							= "Status";
	$_SESSION['eng']['Action'] 							= "Action";
	$_SESSION['eng']['Comment'] 						= "Comment";
	$_SESSION['eng']['active'] 							= "active";
	$_SESSION['eng']['click to disable'] 				= "click to disable";
	$_SESSION['eng']['inactive'] 						= "inactive";
	$_SESSION['eng']['click to activate'] 				= "click to activate";
	$_SESSION['eng']['Edit'] 							= "Edit";

#header.php
	$_SESSION['eng']['Welcome'] 						= "Welcome";
	$_SESSION['eng']['Project selected'] 				= "Project selected";
	$_SESSION['eng']['Change to'] 						= "Change to";
	$_SESSION['eng']['select'] 							= "select";
	$_SESSION['eng']['change'] 							= "change";
	$_SESSION['eng']['language'] 						= "language";
	$_SESSION['eng']['portuguese'] 						= "portuguese";
	$_SESSION['eng']['english'] 						= "english";
	$_SESSION['eng']['new project'] 					= "new project";
	
#analyze_graphs.php
	$_SESSION['eng']['Risk Graphs'] 							= "Risk Graphs";
	$_SESSION['eng']['Use the Value Pie, then sort by'] 		= "Use the Value Pie, then sort by";
	$_SESSION['eng']['By Agent, Type'] 							= "By Agent, Type";
	$_SESSION['eng']['By Magnitude of Risk'] 					= "By Magnitude of Risk";
	$_SESSION['eng']['By Frequency or Rate'] 					= "By Frequency or Rate";
	$_SESSION['eng']['By Loss to Each Item Affected'] 			= "By Loss to Each Item Affected";
	$_SESSION['eng']['By Items Affected'] 						= "By Items Affected";
	$_SESSION['eng']['Consider all items equal, then sort by'] 	= "Consider all items equal, then sort bys";
	$_SESSION['eng']['By Agent, Type'] 							= "By Agent, Type";
	$_SESSION['eng']['By Magnitude of Risk'] 					= "By Magnitude of Risk";
	$_SESSION['eng']['Time horizon'] 							= "Time horizon";
	$_SESSION['eng']['Risk Totals For Agents'] 					= "Risk Totals For Agentss";
	$_SESSION['eng']['By Magnitude of Risk'] 					= "By Magnitude of Risk";
	$_SESSION['eng']['Frequency / Rate'] 						= "Frequency / Rate (A)";
	$_SESSION['eng']['Loss to object'] 							= "Loss to object (B)";
	$_SESSION['eng']['Collection affected'] 					= "Collection affected  (C)";

#analyze_options.php
	$_SESSION['eng']['Analyze Options'] 						= "Analyze Options";
	$_SESSION['eng']['Risk'] 									= "Risk";
	$_SESSION['eng']['select'] 									= "select";
	$_SESSION['eng']['Options'] 								= "Options";
	$_SESSION['eng']['Frequency o Rate (A)'] 					= "Frequency or Rate (A)";
	$_SESSION['eng']['Loss to each item (B)'] 					= "Loss to each item (B)";
	$_SESSION['eng']['Items Affected(C)'] 						= "Items Affected(C)";
	$_SESSION['eng']['Magnitude of Risk']						= "Magnitude of Risk";	
	$_SESSION['eng']['Low'] 									= "Low";
	$_SESSION['eng']['Probable'] 								= "Probable";
	$_SESSION['eng']['High'] 									= "High";
	$_SESSION['eng']['Uncertainty range'] 						= "Uncertainty range";
	$_SESSION['eng']['Expected Scores (average)'] 				= "Expected Scores";
	$_SESSION['eng']['Frequency or Rate'] 						= "Frequency or Rate";
	$_SESSION['eng']['Loss to each item affected'] 				= "Loss to each item affected";
	$_SESSION['eng']['Items affected'] 							= "Items affected";
	
	
#analyze_risks.php
	$_SESSION['eng']['Analyze Risks'] 							= "Analyze Risks";
	$_SESSION['eng']['Name'] 									= "Name";
	$_SESSION['eng']['select'] 									= "select";
	$_SESSION['eng']['Agent'] 									= "Agent";
	$_SESSION['eng']['Description'] 							= "Description";
	$_SESSION['eng']['Frequency o Rate (A'] 					= "Frequency o Rate (A";
	$_SESSION['eng']['Loss to each item (B)'] 					= "Loss to each item (B)";
	$_SESSION['eng']['Items Affected(C)'] 						= "Items Affected(C)";
	$_SESSION['eng']['Magnitude of Risk']						= "Magnitude of Risk";	
	$_SESSION['eng']['Low'] 									= "Low";
	$_SESSION['eng']['Probable'] 								= "Probable";
	$_SESSION['eng']['High'] 									= "High";
	$_SESSION['eng']['Uncertainty range'] 						= "Uncertainty range";
	$_SESSION['eng']['Expected Scores (average)'] 				= "Expected Scores";
	$_SESSION['eng']['Frequency or Rate'] 						= "Frequency or Rate";
	$_SESSION['eng']['Loss to each item affected'] 				= "Loss to each item affected";
	$_SESSION['eng']['Items affected'] 							= "Items affected";
	$_SESSION['eng']['Log triangle distribution (default)'] 	= "Log triangle distribution (default)";
	$_SESSION['eng']['Save'] 									= "Save";
	$_SESSION['eng']['Linear triangle distribution'] 			= "Linear triangle distribution";
	$_SESSION['eng']['Simple use of problable value'] 			= "Simple use of problable value";
	$_SESSION['eng']['Type of calculation used for expected values (used for the risk and any associated options)'] 			= "Type of calculation used for expected values (used for the risk and any associated options)";
	 /* */
	
#analyze_risks_frequency_or_rate.php 
	$_SESSION['eng']['Risk Name'] 																= "Risk Name";
	$_SESSION['eng']['Time horizon, years'] 													= "Time horizon, years";
	$_SESSION['eng']['Select the type risk']													= "Select the type of risk";
	$_SESSION['eng']['Event, rare (time between events greater than time horizon)'] 			= "Event, rare (time between events greater than the time horizon)";
	$_SESSION['eng']['Event, frequent (must be at least one year between events)'] 				= "Event, frequent (must be at least one year between events)";
	$_SESSION['eng']['Process or cumulative events, analysed over a particular period of time'] = "Process or cumulative events, analysed over a particular period of time";
	$_SESSION['eng']['Process or cumulative events, analyzed at the time horizon'] 				= "Process or cumulative events, analyzed at the time horizon";
	$_SESSION['eng']['Process or cumulative events, analyzed at a particular stage of damage'] 	= "Process or cumulative events, analyzed at a particular stage of damage";
	$_SESSION['eng']['Not selected yet']														= "Not selected yet";
	$_SESSION['eng']['How often will the event occur?'] 										= "How often will the event occur?";
	$_SESSION['eng']['Explain your estimates for frequency or rate'] 							= "Explain your estimates for frequency or rate";
	$_SESSION['eng']['Zoom explanation and notes'] 												= "Zoom explanation and notes";
	$_SESSION['eng']['Low estimate of years'] 													= "Low estimate of years";
	$_SESSION['eng']['Average time period between events, years'] 								= "Average time period between events, years";
	$_SESSION['eng']['High estimate of years'] 													= "High estimate of years";
	$_SESSION['eng']['Analysis notes and documents (A)'] 										= "Analysis notes and documents (A)";
	$_SESSION['eng']['Explain your estimates for frequency or rate'] 							= "Explain your estimates for frequency or rate";
	$_SESSION['eng']['Notes for this explanation'] 												= "Notes for this explanation";
	$_SESSION['eng']['Documents associated with this risk its options'] 						= "List of all documents associated with this risk";
	$_SESSION['eng']['Document name'] 															= "Document name";
	$_SESSION['eng']['Comment'] 																= "Comment";
	$_SESSION['eng']['External Link'] 															= "External Link";
	$_SESSION['eng']['or Document link'] 														= "or Document link";
	$_SESSION['eng']['Close'] 																	= "Close";
	$_SESSION['eng']['Save changes'] 															= "Save changes";
	$_SESSION['eng']['Register save successfull'] 												= "Register save successfull";
	$_SESSION['eng']['How often will the event occur?'] 										= "How often will the event occur?";
	$_SESSION['eng']['How soon will the process cause the specified loss?'] 					= "How soon will the process cause the specified loss?";
	$_SESSION['eng']['Most probable time period between events, years'] 						= "Most probable time period between events, years";
	$_SESSION['eng']['Average time period between events (must be more than 1 year)'] 			= "Average time period between events (must be more than 1 year)";
	$_SESSION['eng']['This time period has been selected for analysis of the loss to each item affected'] = "This time period has been selected for analysis of the loss to each item affected";
	
	$_SESSION['eng']['A particular loss to each item affected was selected for analysis, this is the estimate of years required to reach that loss'] = "A particular loss to each item affected was selected for analysis, this is the estimate of years required to reach that loss";
	
	$_SESSION['eng']['The time horizon has been selected and entered automatically'] = "The time horizon has been selected and entered automatically";
	
	
#analyze_risks_frequency_or_rate.php 	
	$_SESSION['eng']['Option summary sentence'] 				= "Option summary sentence";
	$_SESSION['eng']['Capital (one time) cost'] 				= "Capital (one time) cost";
	$_SESSION['eng']['Annual (maint.) cost'] 					= "Annual (maint.) cost";
	$_SESSION['eng']['Date implemented'] 						= "Date implemented";
	$_SESSION['eng']['Most probable time period between events, (must be more than 1 year)'] = "Most probable time period between events, (must be more than 1 year)";
	
#analyze_risks_items_affecteds.php	
	$_SESSION['eng']['This score must be less than or equal to the Expected score. It cannot be changed if the Expected score is empty']																		= "This score must be less than or equal to the Expected score. It cannot be changed if the Expected score is empty";
	
	$_SESSION['eng']['Uncertainty range']											= "Uncertainty range";
	
	$_SESSION['eng']['Explain the estimates of items affected']						= "Explain the estimates of items affected";
	
	$_SESSION['eng']['What fraction of the value will be affected?']				= "What fraction of the value will be affected?";
	
	$_SESSION['eng']['Explain your estimates for frequency or rate']				= "Explain your estimates for frequency or rate";
	
	$_SESSION['eng']['Zoom explanation and notes']									= "Zoom explanation and notes";
	
	$_SESSION['eng']['Select how this score will be entered:']						= "Select how this score will be entered:";
	
	$_SESSION['eng']['Step scale, considering the heritage asset as a whole.']		= "Step scale, considering the heritage asset as a whole.";
	
	$_SESSION['eng']['More precise data using the value pie']						= "More precise data using the value pie";
	
	$_SESSION['eng']['High estimate']												= "High estimate";
	$_SESSION['eng']['Probable loss to each item affected']												= "Probable loss to each item affected";
	
	$_SESSION['eng']['Select']														= "Select";
	
	$_SESSION['eng']['All or most of the whole asset value']						= "All or most of the whole asset value";
	
	$_SESSION['eng']['A large fraction of the whole asset value']					= "A large fraction of the whole asset value";
	
	$_SESSION['eng']['Between large and small fraction of the whole asset value']	= "Between large and small fraction of the whole asset value";
	
	$_SESSION['eng']['A small fraction of the whole asset value']					= "A small fraction of the whole asset value";
	
	$_SESSION['eng']['Between small and tiny fraction of the whole asset value']	= "Between small and tiny fraction of the whole asset value";

	$_SESSION['eng']['Between small and tiny fraction of the whole asset value']	= "Between small and tiny fraction of the whole asset value";
	
	$_SESSION['eng']['A tiny fraction of the whole asset value']					= "A tiny fraction of the whole asset value";
	
	$_SESSION['eng']['Between a tiny fraction and a trace of the whole asset value']	= " Between a tiny fraction and a trace of the whole asset value";
	
	$_SESSION['eng']['Less than a trace of the whole asset value but not zero']		= "Less than a trace of the whole asset value but not zero";
	
	$_SESSION['eng']['All or most of the whole asset value'] 						= "All or most of the whole asset value";
	
	$_SESSION['eng']['Between most and a large fraction of the whole asset value']	= "Between most and a large fraction of the whole asset value";
	
	$_SESSION['eng']['A large fraction of the whole asset value'] 					= "A large fraction of the whole asset value";
	
	$_SESSION['eng']['Between large and small fraction of the whole asset value']	= "Between large and small fraction of the whole asset value";
	
	$_SESSION['eng']['A small fraction of the whole asset value'] 					= "A small fraction of the whole asset value";
	
	$_SESSION['eng']['Between small and tiny fraction of the whole asset value'] 	= "Between small and tiny fraction of the whole asset value";
	
	$_SESSION['eng']['A tiny fraction of the whole asset value'] 						= "A tiny fraction of the whole asset value";
	
	$_SESSION['eng']['Between a tiny fraction and a trace of the whole asset value']	= "Between a tiny fraction and a trace of the whole asset value";
	
	$_SESSION['eng']['A trace of the whole asset value'] 								= "A trace of the whole asset value";
	
	$_SESSION['eng']['Less than a trace of the whole asset value but not zero'] 		= "Less than a trace of the whole asset value but not zero";
	
	$_SESSION['eng']['Low estimate'] 													= "Low estimate";
	
	$_SESSION['eng']['All or most of the whole asset value'] 							= "All or most of the whole asset value";
	
	$_SESSION['eng']['Between most and a large fraction of the whole asset value'] 		= "Between most and a large fraction of the whole asset value";
	
	$_SESSION['eng']['A large fraction of the whole asset value'] 						= "A large fraction of the whole asset value";
	
	$_SESSION['eng']['Between large and small fraction of the whole asset value'] 		= "Between large and small fraction of the whole asset value";
	
	$_SESSION['eng']['A small fraction of the whole asset value'] 						= "A small fraction of the whole asset value";
	
	$_SESSION['eng']['Between small and tiny fraction of the whole asset value'] 		= "Between small and tiny fraction of the whole asset value";
	
	$_SESSION['eng']['A tiny fraction of the whole asset value'] 						= "A tiny fraction of the whole asset value";
	
	$_SESSION['eng']['Between a tiny fraction and a trace of the whole asset value'] 	= "Between a tiny fraction and a trace of the whole asset value";
	
	$_SESSION['eng']['A trace of the whole asset value'] 								= "A trace of the whole asset valu";
	
	$_SESSION['eng']['Less than a trace of the whole asset value but not zero'] 		= "Less than a trace of the whole asset value but not zero";
	
	$_SESSION['eng']['Zoom list of items affected'] 									= "Zoom list of items affected";
	
	$_SESSION['eng']['Analysis notes and documents'] 									= "Analysis notes and documents";
	
	$_SESSION['eng']['Explain your estimates for items affecteds'] 						= "Explain the estimates of items affected";
	
	$_SESSION['eng']['Notes for this explanation'] 										= "Notes for this explanation";
	
	$_SESSION['eng']['Documents associated with this risk its options'] 				= "List of all documents associated with this risk";
	
	$_SESSION['eng']['Document name'] 													= "Document name";
	
	$_SESSION['eng']['Comment'] 														= "Comment";
	
	$_SESSION['eng']['Document file'] 													= "Document file";
	
	$_SESSION['eng']['Original Risk'] 													= "Original Risk";
	
	$_SESSION['eng']['New register'] 													= "New register";

	$_SESSION['eng']['Register'] 														= "Register";
	
	$_SESSION['eng']['numbers of itens'] 												= "numbers of itens";
	
	$_SESSION['eng']['Most probable'] 													= "Most probable";
	
	$_SESSION['eng']['High estimate'] 													= "High estimate";
	
	$_SESSION['eng']['Low estimate'] 													= "Low estimate";
	
	$_SESSION['eng']['Save changes & refresh calculation'] 								= "Save changes & refresh calculation";
	$_SESSION['eng']['Register save successfull'] 										= "Register save successfull";
	
	
?>