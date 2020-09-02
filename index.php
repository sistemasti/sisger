<?php

//Configura paths do sistema
require './routes/Router.php';


//Instacia a classe de rotas
$router = new Router();


//Configura rotas
$router
    ->on('GET', '/', function () {
        require './views/login.php';
    })       
	->on('GET', '/login', function () {
        require './views/login.php';
    })     
	->on('POST', '/login', function () {
        require './views/login.php';
    }) 
	 ->on('GET', '/index', function () {
        require './views/index.php';
    }) 
	 ->on('POST', '/index', function () {
        require './views/index.php';
    }) 
	
	//PROPOSTA
	->on('GET', '/pdf', function () {
        require './views/pdf/index.php';
    })	
	->on('POST', '/pdf', function () {
        require './views/pdf/index.php';
    })	
	
	//INSTITUTION
	->on('GET', '/instituicao', function () {
        require './views/institution_register.php';
    })	
	->on('POST', '/instituicao', function () {
        require './views/institution_register.php';
    })	
	->on('GET', '/institution_edit', function () {
        require './views/institution_edit.php';
    })	
	->on('POST', '/institution_edit', function () {
        require './views/institution_edit.php';
    })	
	->on('GET', '/institution_report', function () {
        require './views/institution_report.php';
    })	
	
	//value_pie_pdf
	->on('GET', '/value_pie_pdf', function () {
        require './views/value_pie_pdf.php';
    })	
	
	//risk_graph_pdf
	->on('GET', '/risk_graph_pdf', function () {
        require './views/risk_graph_pdf.php';
    })	
	
	//USERS
	->on('GET', '/user_register', function () {
        require './views/users_register.php';
    })	
	->on('POST', '/user_register', function () {
        require './views/users_register.php';
    })	
	->on('GET', '/users_edit', function () {
        require './views/users_edit.php';
    })	
	->on('POST', '/users_edit', function () {
        require './views/users_edit.php';
    })	
	->on('GET', '/users_report', function () {
        require './views/users_report.php';
    })	
	
	//DOCUMENTS
	->on('GET', '/document_register', function () {
        require './views/ec_documents_register.php';
    })	
	->on('POST', '/document_register', function () {
        require './views/ec_documents_register.php';
    })	
	->on('GET', '/documents_edit', function () {
        require './views/ec_documents_edit.php';
    })	
	->on('POST', '/documents_edit', function () {
        require './views/ec_documents_edit.php';
    })	
	->on('GET', '/documents_report', function () {
        require './views/ec_documents.php';
    })	
	
	
	//PROJECTS
	->on('GET', '/project_register', function () {
        require './views/project_register.php';
    })	
	->on('POST', '/project_register', function () {
        require './views/project_register.php';
    })	
	->on('GET', '/project_edit', function () {
        require './views/project_edit.php';
    })	
	->on('POST', '/project_edit', function () {
        require './views/project_edit.php';
    })	
	->on('GET', '/project_report', function () {
        require './views/project_report.php';
    })	
	
	
	//RISKS
	->on('GET', '/ir_risks', function () {
        require './views/ir_risks.php';
    })
	->on('GET', '/ir_register', function () {
        require './views/ir_register.php';
    })	
	->on('POST', '/ir_register', function () {
        require './views/ir_register.php';
    })
	->on('GET', '/ir_edit', function () {
        require './views/ir_edit.php';
    })	
	->on('POST', '/ir_edit', function () {
        require './views/ir_edit.php';
    })	


	//MIXED_VALUES
	->on('GET', '/mixed_values', function () {
        require './views/mixed_values.php';
    })
	->on('POST', '/mixed_value', function () {
        require './views/mixed_values.php';
    })
	->on('GET', '/values_register', function () {
        require './views/values_register.php';
    })
	->on('POST', '/values_register', function () {
        require './views/values_register.php';
    })
	
	->on('GET', '/values_edit', function () {
        require './views/values_edit.php';
    })
	->on('POST', '/values_edit', function () {
        require './views/values_edit.php';
    })
	
	//ZOOM LIST
	->on('GET', '/zoom_list', function () {
        require './views/zoom_list.php';
    })
	->on('POST', '/zoom_list', function () {
        require './views/zoom_list.php';
    })
	
	->on('GET', '/zoom_list_register', function () {
        require './views/zoom_list_register.php';
    })
	->on('POST', '/zoom_register', function () {
        require './views/zoom_list_register.php';
    })	
	
	->on('GET', '/zoom_list_register_o', function () {
        require './views/zoom_list_register_o.php';
    })
	->on('POST', '/zoom_register_o', function () {
        require './views/zoom_list_register_o.php';
    })	
	
	->on('GET', '/zoom_edit', function () {
        require './views/zoom_edit.php';
    })
	->on('POST', '/zoom_edit', function () {
        require './views/zoom_edit.php';
    })
	

	//AGENTS
	->on('GET', '/ir_agents', function () {
        require './views/ir_agents.php';
    })
	->on('GET', '/ir_agents_register', function () {
        require './views/ir_agents_register.php';
    })	
	->on('POST', '/ir_agents_register', function () {
        require './views/ir_agents_register.php';
    })
	->on('GET', '/ir_agents_edit', function () {
        require './views/ir_agents_edit.php';
    })	
	->on('POST', '/ir_agents_edit', function () {
        require './views/ir_agents_edit.php';
    })	


	//RISK GROUP
	->on('GET', '/ir_risk_group', function () {
        require './views/ir_risk_group.php';
    })
	->on('GET', '/ir_risk_group_register', function () {
        require './views/ir_risk_group_register.php';
    })	
	->on('POST', '/ir_risk_group_register', function () {
        require './views/ir_risk_group_register.php';
    })
	->on('GET', '/ir_risk_group_edit', function () {
        require './views/ir_risk_group_edit.php';
    })	
	->on('POST', '/ir_risk_group_edit', function () {
        require './views/ir_risk_group_edit.php';
    })	


	//OPTIONS RISK
	->on('GET', '/tr_risk_option', function () {
        require './views/tr_risk_option.php';
    })
	->on('GET', '/tr_risk_options_register', function () {
        require './views/tr_risk_options_register.php';
    })	
	->on('POST', '/tr_risk_options_register', function () {
        require './views/tr_risk_options_register.php';
    })
	->on('GET', '/tr_risk_options_edit', function () {
        require './views/tr_risk_options_edit.php';
    })	
	->on('POST', '/tr_risk_options_edit', function () {
        require './views/tr_risk_options_edit.php';
    })	


	//ANALYZE RISKS
	->on('GET', '/analyze_risks', function () {
        require './views/analyze_risks.php';
    })
	
	//MATRIX
	->on('GET', '/matrix', function () {
        require './views/matrix.php';
    })
	
	
	->on('GET', '/analyze_graphs', function () {
        require './views/analyze_graphs.php';
    })	
	
	//IDENIFY OPTIONS
	->on('GET', '/identify_options', function () {
        require './views/identify_options.php';
    })
	
	
	->on('GET', '/analyze_graphs', function () {
        require './views/analyze_graphs.php';
    })	
	

	//LOGIN
	->on('GET', '/login', function () {
        require './views/login.php';
    })	
	
	//LOGOUT
	->on('GET', '/logout', function () {
        require './views/logout.php';
    })	
	
	
	//FIRST_ACCESS
	->on('GET', '/first_acess', function () {
        require './views/first_acess.php';
    })	
	->on('POST', '/first_acess', function () {
        require './views/first_acess.php';
    })
	
	//ENTER VALUES
	->on('GET', '/enter_values', function () {
        require './views/enter_values.php';
    })	
	->on('POST', '/enter_values', function () {
        require './views/enter_values.php';
    })	
	
	//SELECT THE VALUES PIE
	->on('GET', '/select_values', function () {
        require './views/select_values.php';
    })	
	->on('POST', '/select_values', function () {
        require './views/select_values.php';
    })	
	
	//BUILD VALUE
	->on('GET', '/treat_risk', function () {
        require './views/treat_risk.php';
    })	
	
	//Analyze ptions
	->on('GET', '/analyze_options', function () {
        require './views/analyze_options2.php';
    })	
	
	//communicate
	->on('GET', '/risk_history', function () {
        require './views/risk_history.php';
    })	
		
	//BUILD VALUE
	->on('GET', '/communicate', function () {
        require './views/communicate.php';
    })	
		
	//BUILD VALUE
	->on('GET', '/build_value', function () {
        require './views/build_value.php';
    })		
	
	//BUILD VALUE
	->on('GET', '/build_value_sd', function () {
        require './views/build_value_sd.php';
    })	

	
	//TESTS
	->on('GET', '/aa', function () {
        return 'aa';
    })
    ->post('/(\w+)/(\w+)/(\w+)', function ($module, $class, $method) {
        var_dump([$module, $class, $method]);
    })
    ->get('/view/(\w+)', function ($view) {
        ob_start();
        require dirname(__DIR__) . "./views\{$view}.php";
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    })
    ->get('/(.*)', function ($uri) {
        echo ($uri);
    });

//executa rotas
echo $router($router->method(), $router->uri());

