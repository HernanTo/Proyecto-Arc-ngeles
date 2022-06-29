<?php
// incluye la clase Db
require_once('conexion.php');
 
	class Crudvistasd{
		// constructor de la clase
		public function __construct(){}
 
		// método para mostrar todos los libros
		public function mostrar(){
			$db=Db::conectar();
			$listavistasd=[];
			$select=$db->query('SELECT pNombre_U,sNombre_U,pApellido_U,sApellido_U FROM doctor inner join usuario on fk_pk_usuario_Documento_U = documento_U inner join citasAgendadas on fk_doctor_Documento_U = fk_pk_usuario_Documento_U');

			foreach($select->fetchAll() as $vistasd){
				$myvistasd= new vistasd();
				$myvistasd->setpNombre_d($vistasd['pNombre_U']);
				$myvistasd->setsNombre_d($vistasd['sNombre_U']);
				$myvistasd->setpApellido_d($vistasd['pApellido_U']);
				$myvistasd->setsApellido_d($vistasd['sApellido_U']);
				$listavistasd[]=$myvistasd;
			}
			return $listavistasd;
		}
		}
		class Crudvistasp{
			// constructor de la clase
			public function __construct(){}
	 
			// método para mostrar todos los libros
			public function mostrar(){
				$db=Db::conectar();
				$listavistasp=[];
				$select1=$db->query('SELECT pNombre_U,sNombre_U,pApellido_U,sApellido_U FROM usuario inner join paciente on documento_U = fk_pk_usuario_Documento_U');
	
				foreach($select1->fetchAll() as $vistasp){
					$myvistasp= new vistasp();
					$myvistasp->setpNombre_U($vistasp['pNombre_U']);
					$myvistasp->setsNombre_U($vistasp['sNombre_U']);
					$myvistasp->setpApellido_U($vistasp['pApellido_U']);
					$myvistasp->setsApellido_U($vistasp['sApellido_U']);
					$listavistasp[]=$myvistasp;
				}
				return $listavistasp;
			}
			}
			class Crudvistaca{
				// constructor de la clase
				public function __construct(){}
		 
				// método para mostrar todos los libros
				public function mostrar(){
					$db=Db::conectar();
					$listavistaca=[];
					$select2=$db->query('SELECT NombreTipoCita,dia_hora_cita FROM citasAgendadas inner join tiposdecita on fk_pk_idTipocita = idTiposCita');
		
					foreach($select2->fetchAll() as $vistaca){
						$myvistaca= new vistaca();
						$myvistaca->setNombreTipoCita($vistaca['NombreTipoCita']);
						$myvistaca->setdia_hora_cita($vistaca['dia_hora_cita']);
						$listavistaca[]=$myvistaca;
					}
					return $listavistaca;
				}
				}
				

?>