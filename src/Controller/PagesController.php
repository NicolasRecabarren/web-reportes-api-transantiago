<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

use Cake\Http\Client;
use Cake\Utility\Hash;
use Cake\I18n\Time;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{


    public function dashboard(){
        $httpClient = new Client();

        $response = $httpClient->get('http://34.70.121.7:8080/');
        $mediciones = $response->getJson();

        $this->set('cantTomadas', count($mediciones));
        $this->set('cantBuses'  , count(Hash::combine($mediciones,'{s}.recorrido','{s}.recorrido')));
        $this->set('mediciones' , $mediciones);
    }

    public function reportes(){

    }

    public function getMediciones(){
        $this->viewBuilder()->setLayout(false);
        $httpClient = new Client();

        $response = $httpClient->get('http://34.70.121.7:8080/');
        $medidas = $response->getJson();

        if($this->request->is('post')){
            $nroRecorrido = $this->request->getData('nroRecorrido');
            $tipoReporte  = $this->request->getData('tipoReporte');
            $fecha        = $this->request->getData('fecha');
            $horaDesde    = $this->request->getData('horaDesde');
            $horaHasta    = $this->request->getData('horaHasta');

            $mediciones = Hash::extract($medidas,'{s}[recorrido='.$nroRecorrido.']');
            switch($tipoReporte){
                case "diario" : $dataGrafico = $this->getReporteHoras(  $mediciones,$fecha,$horaDesde,$horaHasta); break;
                case "semanal": $dataGrafico = $this->getReporteSemanal($mediciones,$fecha,$horaDesde,$horaHasta); break;
                case "mensual": $dataGrafico = $this->getReporteMensual($mediciones,$fecha); break;
            }

            $this->set(compact('dataGrafico'));
        }
    }

    protected function getReporteHoras($mediciones,$fecha,$horaDesde,$horaHasta){
        $dataGrafico = [];

        $desde = 0; $hasta = 23;
        if(!empty($horaDesde)){ $desde = (int)$horaDesde; }
        if(!empty($horaHasta)){ $hasta = (int)$horaHasta; }

        for( $i = $desde; $i <= $hasta; $i++ ){
            $hora = $i;
            if($hora < 10){
                $hora = '0'.$hora;
            }

            $dataGrafico["$hora:00"] = 0;
        }

        list($diaFechaFiltrada, $mesFechaFiltrada, $anioFechaFiltrada) = explode('/',$fecha);

        foreach($mediciones as $medicion){

            if(!empty($fecha) && strpos($medicion['fecha'],"$anioFechaFiltrada-$mesFechaFiltrada-$diaFechaFiltrada") === false){
                continue;
            }

            $hora = substr($medicion['fecha'],11,2) + 1;
            if(strlen($hora) == 1){
                $hora = str_pad($hora,2,'0',STR_PAD_LEFT);
            }

            if($hora > 23 || !isset($dataGrafico["$hora:00"])){
                continue;
            }

            $dataGrafico["$hora:00"] += $medicion['cant_personas'];
        }

        return [
            'label' => 'Cantidad de Personas Detectadas Por Hora',
            'labels'=> array_keys($dataGrafico),
            'datos' => $dataGrafico
        ];
    }

    protected function getReporteMensual($mediciones,$fecha) {
        list($mesFiltrado,$anioFiltrado) = explode('/',$fecha);

        $diaInicio = 1;
        $diaTermino = (new Time("$anioFiltrado-$mesFiltrado-01"))->modify('last day of this month')->format('d');

        for( $i = $diaInicio; $i <= $diaTermino; $i++ ){
            $dia = str_pad($i,2,'0',STR_PAD_LEFT);
            $dataGrafico[$dia] = 0;
        }

        foreach($mediciones as $medicion){

            if(!empty($fecha) && strpos($medicion['fecha'],"$anioFiltrado-$mesFiltrado") === false){
                continue;
            }

            $dia = str_pad(substr($medicion['fecha'],8,2),2,'0',STR_PAD_LEFT);
            $dataGrafico[$dia] += $medicion['cant_personas'];
        }

        return [
            'label' => 'Cantidad de Personas Detectadas Por Día',
            'labels'=> array_keys($dataGrafico),
            'datos' => $dataGrafico
        ];
    }

}
