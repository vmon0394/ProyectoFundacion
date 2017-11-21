<?php

session_start();

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripslashes($_GET['opcion'])) : '0';
include_once '../Model/libCombos.php';

$GLOBALS['objCombo'] = new libCombos();

switch ($opcion) {

    //El caso 1 del controlador recibe el id del departamento seleccionado, este dato es enviado por método set a la librería y 
    //se ejecuta el método llamado, este retorna un vector con los municipios del departamento seleccionado.
    case '1': {

            $idDepartamento = isset($_GET['depar']) ? htmlspecialchars(stripslashes($_GET['depar'])) : '0';

            $GLOBALS['objCombo']->comboMunicipios($idDepartamento);
            echo $GLOBALS['objCombo']->getResult();
            break;
        }

    //El caso 2 del controlador recibe el id de la habilidad seleccionado, este dato es enviado por método set a la librería y 
    //se ejecuta el método llamado, este retorna un vector con las técnicas que estas por la habilidad elegida.
    case '2': {

            $idHabilidad = isset($_GET['habili']) ? htmlspecialchars(stripslashes($_GET['habili'])) : '0';

            $GLOBALS['objCombo']->comboTecnicas($idHabilidad);
            echo $GLOBALS['objCombo']->getResult();
            break;
        }

    case '3': {

            $idSemillero = isset($_GET['idSemillero']) ? htmlspecialchars(stripslashes($_GET['idSemillero'])) : '0';

            $GLOBALS['objCombo']->comboTaller($idSemillero);
            echo $GLOBALS['objCombo']->getResult();
            break;
        }

    case '4': {

            $compania = isset($_GET['idCompania']) ? htmlspecialchars(stripslashes($_GET['idCompania'])) : '0';

            $GLOBALS['objCombo']->setForeign($compania);
            $GLOBALS['objCombo']->comboPadrinosDisponibles();
            echo $GLOBALS['objCombo']->getResult();
            break;
        }

    case '5': {

            $semillero = isset($_GET['idSemillero']) ? htmlspecialchars(stripslashes($_GET['idSemillero'])) : '0';

            $GLOBALS['objCombo']->setForeign($semillero);
            $GLOBALS['objCombo']->comboParticipanteDisponiblesPorPadrino();
            echo $GLOBALS['objCombo']->getResult();
            break;
        }

    case '6': {

            $compania = isset($_GET['idCompania']) ? htmlspecialchars(stripslashes($_GET['idCompania'])) : '0';

            $GLOBALS['objCombo']->setForeign($compania);
            $GLOBALS['objCombo']->comboPadrinosAsignados();
            echo $GLOBALS['objCombo']->getResult();
            break;
        }

    case '7': {

            $semillero = isset($_GET['idSemillero']) ? htmlspecialchars(stripslashes($_GET['idSemillero'])) : '0';

            $GLOBALS['objCombo']->setForeign($semillero);
            $GLOBALS['objCombo']->comboParticipanteConPadrino();
            echo $GLOBALS['objCombo']->getResult();
            break;
        }

    case '8': {

            $idAliando = isset($_GET['idAliado']) ? htmlspecialchars(stripslashes($_GET['idAliado'])) : '0';

            $GLOBALS['objCombo']->setForeign($idAliando);
            $GLOBALS['objCombo']->comboAliados2();
            echo $GLOBALS['objCombo']->getResult();
            break;
        }

    case '9': {

            $idAliando = isset($_GET['idAliado']) ? htmlspecialchars(stripslashes($_GET['idAliado'])) : '0';
            $idAliando2 = isset($_GET['idAliado2']) ? htmlspecialchars(stripslashes($_GET['idAliado2'])) : '0';

            $GLOBALS['objCombo']->setForeign($idAliando);
            $GLOBALS['objCombo']->comboAliados3($idAliando2);
            echo $GLOBALS['objCombo']->getResult();
            break;
        }
}