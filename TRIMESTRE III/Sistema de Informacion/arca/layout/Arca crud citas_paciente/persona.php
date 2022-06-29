<?php
	class vistasd{
		private $pNombre_d;
		private $sNombre_d;
		private $pApellido_d;
		private $sApellido_d;
   function __construct(){}


        public function getpNombre_d(){
			return $this->pNombre_d;
		}

		public function getsNombre_d(){
			return $this->sNombre_d;
		}

		public function getpApellido_d(){
			return $this->pApellido_d;
		}

		public function getsApellido_d(){
			return $this->sApellido_d;
		}


        

		public function setpNombre_d($pNombre_d){
			$this->pNombre_d = $pNombre_d;
		}

		public function setsNombre_d($sNombre_d){
			$this->sNombre_d = $sNombre_d;
		}

		public function setpApellido_d($pApellido_d){
			$this->pApellido_d = $pApellido_d;
		}

		public function setsApellido_d($sApellido_d){
			$this->sApellido_d = $sApellido_d;
		}



	}
	class vistasp{
		private $pNombre_U;
		private $sNombre_U;
		private $pApellido_U;
		private $sApellido_U;
   function __construct(){}


		public function getpNombre_U(){
			return $this->pNombre_U;
		}

		public function getsNombre_U(){
			return $this->sNombre_U;
		}

		public function getpApellido_U(){
			return $this->pApellido_U;
		}

		public function getsApellido_U(){
			return $this->sApellido_U;
		}

        

		public function setpNombre_U($pNombre_U){
			$this->pNombre_U = $pNombre_U;
		}

		public function setsNombre_U($sNombre_U){
			$this->sNombre_U = $sNombre_U;
		}

		public function setpApellido_U($pApellido_U){
			$this->pApellido_U = $pApellido_U;
		}

		public function setsApellido_U($sApellido_U){
			$this->sApellido_U = $sApellido_U;
		}



	}
	class vistaca{
		private $NombreTipoCita;
		private $dia_hora_cita;
        function __construct(){}



		public function getNombreTipoCita(){
			return $this->NombreTipoCita;
		   }
		
		public function getdia_hora_cita(){
			return $this->dia_hora_cita;
		   }

        

		public function setNombreTipoCita($NombreTipoCita){
			$this->NombreTipoCita = $NombreTipoCita;
		   }
		
		public function setdia_hora_cita($dia_hora_cita){
			$this->dia_hora_cita = $dia_hora_cita;
		}


	}

?>
