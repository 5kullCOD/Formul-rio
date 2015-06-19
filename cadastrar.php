<?php
    sleep(2);
    include_once 'conn.php';

    if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'sim'):
    	$novos_campos = array();
    	$campos_post = $_POST['campos'];

        $respostas = array();
    	foreach($campos_post as $indice => $valor){
    		$novos_campos[$valor['name']] = $valor['value'];
    	}

    	//echo '<pre>';
    	//print_r($novos_campos);

        if(!strstr($novos_campos['email'], '@')){
            $respostas['erro'] = 'sim';
            $respostas['getErro'] = 'Email inválido, revise-o por favor!<br> verifique o @ e/ou .dominio';

        }elseif($novos_campos['senha'] != $novos_campos['csenha']){
            $respostas['erro'] = 'sim';
            $respostas['getErro'] = 'Senhas não correspondem, revise-as por favor!';

        }elseif(!strstr($novos_campos['facebook'], 'https://')){
            $respostas['erro'] = 'sim';
            $respostas['getErro'] = 'Houve um erro na Url do facebook, revise-a por favor!';

        }elseif(!strstr($novos_campos['twitter'], 'https://')){
            $respostas['erro'] = 'sim';
            $respostas['getErro'] = 'Houve um erro na Url do Twitter, revise-a por favor!';

        }elseif(!strstr($novos_campos['google'], 'https://')){
            $respostas['erro'] = 'sim';
            $respostas['getErro'] = 'Houve um erro na Url do Google+, revise-a por favor!';

        }elseif(strlen($novos_campos['telefone']) <> 15){
            $respostas['erro'] = 'sim';
            $respostas['getErro'] = 'Há um erro no Telefone, o reveja por favor!<br>formatos válidos: (xx) 1234-5678 ou (xx) 12345-6789';

        }else{
            $respostas['erro'] = 'nao';

            $insert_db = $pdo->prepare("INSERT INTO `usuarios` SET nome = ?, sobrenome = ?, email = ?, senha = ?, senhac = ?, telefone = ?, facebook = ?, twitter = ?, gmais = ?");
            $array_sql = array(
                $novos_campos['nome'],
                $novos_campos['sobrenome'],
                $novos_campos['email'],
                $novos_campos['senha'],
                $novos_campos['csenha'],
                $novos_campos['telefone'],
                $novos_campos['facebook'],
                $novos_campos['twitter'],
                $novos_campos['google']
            );
            if($insert_db->execute($array_sql)){
                $respostas['msg'] = 'Concluído com Sucesso :)';
            }else{
                $respostas['erro'] = 'sim';
                $respostas['getErro'] = 'Houve uma falha no Banco de dados<br>Desculpe tente novamente mais tarde :(';
            }
        }

        echo json_encode($respostas);
    endif;
?>
