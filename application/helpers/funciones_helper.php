<?php
function formatoEstado($estado){
        $valor='';
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