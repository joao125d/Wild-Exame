<?php

Class modules {

    public static function newModule($year, $number, $name, $hours, $disciplineID){

		if(modules::testModule($year, $number, $name, $hours, $disciplineID)){
			return modules::getModule($year, $number, $name, $hours, $disciplineID);
		} else {
			DB::table('modules')->insert(
				array('m_year' => $year, 'm_num' => $number, 'm_name' => $name, 'm_hours' => $hours, 'm_did' => $disciplineID)
			);
		}

    }
	
    public static function testModule($year, $number, $name, $hours, $disciplineID){

		if(count(DB::table('modules')->where('m_year', '=', $year)->where('m_num', '=', $number)->where('m_name', '=', $name)->where('m_hours', '=', $hours)->where('m_did', '=', $disciplineID)->first())){
			return true;
		} else {
			return false;
		}
		
    }
	
    public static function getModule($year, $number, $name, $hours, $disciplineID){

		if(count(DB::table('modules')->where('m_year', '=', $year)->where('m_num', '=', $number)->where('m_name', '=', $name)->where('m_hours', '=', $hours)->where('m_did', '=', $disciplineID)->first())){
			return DB::table('modules')->where('m_year', '=', $year)->where('m_num', '=', $number)->where('m_name', '=', $name)->where('m_hours', '=', $hours)->where('m_did', '=', $disciplineID)->first();
		} else {
			return false;
		}
		
    }
	
    public static function getModuleId($year, $number, $name, $hours, $disciplineID){

		if(count(DB::table('modules')->where('m_year', '=', $year)->where('m_num', '=', $number)->where('m_name', '=', $name)->where('m_hours', '=', $hours)->where('m_did', '=', $disciplineID)->first())){
			return DB::table('modules')->where('m_year', '=', $year)->where('m_num', '=', $number)->where('m_name', '=', $name)->where('m_hours', '=', $hours)->where('m_did', '=', $disciplineID)->first()->m_id;
		} else {
			return false;
		}
		
    }
    
    public static function newDiscipline($name){

		if(!modules::testDiscipline($name)){
			DB::table('disciplines')->insert(
				array('d_name' => $name)
			);
		}

    }
	
    public static function testDiscipline($name){

		if(count(DB::table('disciplines')->where('d_name', '=', $name)->first())){
			return true;
		} else {
			return false;
		}
		
    }
    
    public static function getDisciplineId($name){

		$tmp = DB::table('disciplines')->where('d_name', '=', $name)->first();
		if(count($tmp)){
			return $tmp->d_id;
		} else {
			return false;
		}
		
    }
}