<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/** 
*	@var Load from controller  -> $this->load->helper('v2010/customarray');
**/
if(!function_exists('customarray')){

	/**
	*	function key_to_sequence($parama)
	*	convert array key to array sequence (mostly filter for model return)
	* 		@param		:
	*			-> array_key ARRAY(key) required
	*			-> deprecated_key STR required
	*
	*		@var 		: Request variable 
	*			-> $params->array_key=array(
	*					0=>array('sample_key'=>'567'),
	*					1=>array('sample_key'=>'987'));
	*			-> $params->deprecated_key='sample_key';
	*
	*		@return 	: variable
	*			-> $return->array_sequence ? array()
	*			-> $return->stat ?(true:false)
	*			-> $return->msg ? string
	*				=array(
	*					0=>'567',
	*					1=>'987'
	*					);
	*
	*		@package 	: 
	*		INTEGRATED WITH Controller
	*			-> {aaa}/v2010/samplecontroller/index 
	*			-> ...
	**/
	function key_to_sequence($params){
		$arrseq=array();
		$array_key=array();
		$msg='succes';
		$stat=true;
		if(!isset($params->array_key)){$stat=false;$msg='params->array_key not set correctly';}
		elseif(!isset($params->deprecated_key)){$stat=false;$msg='$params->deprecated_key not set correctly';}
		else{
			$keynode=$params->deprecated_key;
			$n=0;$arrseq=array();
			foreach ($params->array_key as $key => $value){
				$arrseq[$n]=$value[$keynode];
				$n++;
			}		
		}
		$return->array_sequence=$arrseq;
		$return->stat=$stat;
		$return->msg=$msg;
		return $return;
	}
}
