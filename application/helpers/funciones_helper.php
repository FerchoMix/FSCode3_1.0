<?php
    function formatoFechaHoraVista($fecha){
        $dia=substr($fecha,8,2);
        $mes=substr($fecha,5,2);
        switch($mes){
            case '01':
                $mes = 'Ene';
                break;
            case '02':
                $mes = 'Feb';
                break;
            case '03':
                $mes = 'Mar';
                break;
            case '04':
                $mes = 'Abr';
                break;
            case '05':
                $mes = 'May';
                break;
            case '06':
                $mes = 'Jun';
                break;
            case '07':
                $mes = 'Jul';
                break;
            case '08':
                $mes = 'Ago';
                break;
            case '09':
                $mes = 'Set';
                break;
            case '10':
                $mes = 'Oct';
                break;
            case '11':
                $mes = 'Nov';
                break;
            case '12':
                $mes = 'Dic';
                break;
            default:
                $mes = '---';
        }
        $anio=substr($fecha,0,4);
        $hora=substr($fecha,11,5);
        $fechaForm=$dia."/".$mes."/".$anio." ".$hora;
        return $fechaForm;
    }
    function formatoFechaBD($fecha){
        $dia=substr($fecha,0,2);
        $mes=substr($fecha,3,2);
        $anio=substr($fecha,6,4);
        $fechaForm=$anio."-".$mes."-".$dia;
        return $fechaForm;
    }
    function formatoEstado($estado){
        $valor;
        switch($estado){
            case 1:
                $valor='Nuevo';
                break;
            case 2:
                $valor = 'Modificado';
                break;
            case 3:
                $valor = 'Eliminado';
                break;
            case 4:
                $valor = 'Habilitado';
                break;
            default:
                $valor = '';
        }
        return $valor;
    }
    function formatoSexo($sexo){
        $valor = '';
        switch($sexo){
            case 'H':
                $valor = 'Hombre';
                break;
            case 'M':
                $valor = 'Mujer';
                break;
            default:
                $valor = '';
        }
        return $valor;
    }
    function verificarTipo($tipo, $valor) {
        return in_array($tipo, $valor); // Verifica si el tipo está en el array
    }
    function verificarExtension($archivo){
        $res="";
        for($i=0; $i<strlen($archivo); $i++){
            if(substr($archivo,$i,1)=='.'){
                for($j=$i; $j<strlen($archivo); $j++){
                    $res=$res.substr($archivo,$j,1);
                }
                break;
            }
        }
        return $res;
    }
?>