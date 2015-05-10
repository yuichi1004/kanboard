<?php

/*
 * KQLParser.php is generated from KQLParser.peg.inc by the following command.
 * $ php vendor/hnesk/php-peg/cli.php app/Libs/KQLParser.peg.inc app/Libs/KQLParser.php
 *
 * Please do NOT change KQLParser.php directry.
 */

namespace Libs;
use hafriedlander\Peg\Parser;

class KQLParser extends Parser\Basic {

/* crlf: /\r\n/ */
protected $match_crlf_typestack = array('crlf');
function match_crlf ($stack = array()) {
	$matchrule = "crlf"; $result = $this->construct($matchrule, $matchrule, null);
	if (( $subres = $this->rx( '/\r\n/' ) ) !== FALSE) {
		$result["text"] .= $subres;
		return $this->finalise($result);
	}
	else { return FALSE; }
}


/* atom: /( (&[A-Za-z]+;) | (&\#(xX)?[A-Fa-f0-9]+;) | ([^\x00-\x1F\x20()<>@,;:\[\]\\".]) )+/ */
protected $match_atom_typestack = array('atom');
function match_atom ($stack = array()) {
	$matchrule = "atom"; $result = $this->construct($matchrule, $matchrule, null);
	if (( $subres = $this->rx( '/( (&[A-Za-z]+;) | (&\#(xX)?[A-Fa-f0-9]+;) | ([^\x00-\x1F\x20()<>@,;:\[\]\\\\".]) )+/' ) ) !== FALSE) {
		$result["text"] .= $subres;
		return $this->finalise($result);
	}
	else { return FALSE; }
}


/* qtext-chars: /[^"\\\x0D]+/ */
protected $match_qtext_chars_typestack = array('qtext_chars');
function match_qtext_chars ($stack = array()) {
	$matchrule = "qtext_chars"; $result = $this->construct($matchrule, $matchrule, null);
	if (( $subres = $this->rx( '/[^"\\\\\x0D]+/' ) ) !== FALSE) {
		$result["text"] .= $subres;
		return $this->finalise($result);
	}
	else { return FALSE; }
}


/* quoted-pair: /\\./ */
protected $match_quoted_pair_typestack = array('quoted_pair');
function match_quoted_pair ($stack = array()) {
	$matchrule = "quoted_pair"; $result = $this->construct($matchrule, $matchrule, null);
	if (( $subres = $this->rx( '/\\\\./' ) ) !== FALSE) {
		$result["text"] .= $subres;
		return $this->finalise($result);
	}
	else { return FALSE; }
}


/* lwsp-char: " " | "\t" */
protected $match_lwsp_char_typestack = array('lwsp_char');
function match_lwsp_char ($stack = array()) {
	$matchrule = "lwsp_char"; $result = $this->construct($matchrule, $matchrule, null);
	$_7 = NULL;
	do {
		$res_4 = $result;
		$pos_4 = $this->pos;
		if (substr($this->string,$this->pos,1) == ' ') {
			$this->pos += 1;
			$result["text"] .= ' ';
			$_7 = TRUE; break;
		}
		$result = $res_4;
		$this->pos = $pos_4;
		if (( $subres = $this->literal( '\t' ) ) !== FALSE) {
			$result["text"] .= $subres;
			$_7 = TRUE; break;
		}
		$result = $res_4;
		$this->pos = $pos_4;
		$_7 = FALSE; break;
	}
	while(0);
	if( $_7 === TRUE ) { return $this->finalise($result); }
	if( $_7 === FALSE) { return FALSE; }
}


/* linear-white-space: (crlf? lwsp-char)+ */
protected $match_linear_white_space_typestack = array('linear_white_space');
function match_linear_white_space ($stack = array()) {
	$matchrule = "linear_white_space"; $result = $this->construct($matchrule, $matchrule, null);
	$count = 0;
	while (true) {
		$res_12 = $result;
		$pos_12 = $this->pos;
		$_11 = NULL;
		do {
			$res_9 = $result;
			$pos_9 = $this->pos;
			$matcher = 'match_'.'crlf'; $key = $matcher; $pos = $this->pos;
			$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
			if ($subres !== FALSE) { $this->store( $result, $subres ); }
			else {
				$result = $res_9;
				$this->pos = $pos_9;
				unset( $res_9 );
				unset( $pos_9 );
			}
			$matcher = 'match_'.'lwsp_char'; $key = $matcher; $pos = $this->pos;
			$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
			if ($subres !== FALSE) { $this->store( $result, $subres ); }
			else { $_11 = FALSE; break; }
			$_11 = TRUE; break;
		}
		while(0);
		if( $_11 === FALSE) {
			$result = $res_12;
			$this->pos = $pos_12;
			unset( $res_12 );
			unset( $pos_12 );
			break;
		}
		$count++;
	}
	if ($count >= 1) { return $this->finalise($result); }
	else { return FALSE; }
}


/* qtext: linear-white-space | qtext-chars */
protected $match_qtext_typestack = array('qtext');
function match_qtext ($stack = array()) {
	$matchrule = "qtext"; $result = $this->construct($matchrule, $matchrule, null);
	$_16 = NULL;
	do {
		$res_13 = $result;
		$pos_13 = $this->pos;
		$matcher = 'match_'.'linear_white_space'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) {
			$this->store( $result, $subres );
			$_16 = TRUE; break;
		}
		$result = $res_13;
		$this->pos = $pos_13;
		$matcher = 'match_'.'qtext_chars'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) {
			$this->store( $result, $subres );
			$_16 = TRUE; break;
		}
		$result = $res_13;
		$this->pos = $pos_13;
		$_16 = FALSE; break;
	}
	while(0);
	if( $_16 === TRUE ) { return $this->finalise($result); }
	if( $_16 === FALSE) { return FALSE; }
}


/* quoted-string: .'"' ( quoted-pair | qtext )* .'"' */
protected $match_quoted_string_typestack = array('quoted_string');
function match_quoted_string ($stack = array()) {
	$matchrule = "quoted_string"; $result = $this->construct($matchrule, $matchrule, null);
	$_27 = NULL;
	do {
		if (substr($this->string,$this->pos,1) == '"') { $this->pos += 1; }
		else { $_27 = FALSE; break; }
		while (true) {
			$res_25 = $result;
			$pos_25 = $this->pos;
			$_24 = NULL;
			do {
				$_22 = NULL;
				do {
					$res_19 = $result;
					$pos_19 = $this->pos;
					$matcher = 'match_'.'quoted_pair'; $key = $matcher; $pos = $this->pos;
					$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
					if ($subres !== FALSE) {
						$this->store( $result, $subres );
						$_22 = TRUE; break;
					}
					$result = $res_19;
					$this->pos = $pos_19;
					$matcher = 'match_'.'qtext'; $key = $matcher; $pos = $this->pos;
					$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
					if ($subres !== FALSE) {
						$this->store( $result, $subres );
						$_22 = TRUE; break;
					}
					$result = $res_19;
					$this->pos = $pos_19;
					$_22 = FALSE; break;
				}
				while(0);
				if( $_22 === FALSE) { $_24 = FALSE; break; }
				$_24 = TRUE; break;
			}
			while(0);
			if( $_24 === FALSE) {
				$result = $res_25;
				$this->pos = $pos_25;
				unset( $res_25 );
				unset( $pos_25 );
				break;
			}
		}
		if (substr($this->string,$this->pos,1) == '"') { $this->pos += 1; }
		else { $_27 = FALSE; break; }
		$_27 = TRUE; break;
	}
	while(0);
	if( $_27 === TRUE ) { return $this->finalise($result); }
	if( $_27 === FALSE) { return FALSE; }
}


/* keyword: !op (atom | quoted-string) */
protected $match_keyword_typestack = array('keyword');
function match_keyword ($stack = array()) {
	$matchrule = "keyword"; $result = $this->construct($matchrule, $matchrule, null);
	$_37 = NULL;
	do {
		$res_29 = $result;
		$pos_29 = $this->pos;
		$matcher = 'match_'.'op'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) {
			$this->store( $result, $subres );
			$result = $res_29;
			$this->pos = $pos_29;
			$_37 = FALSE; break;
		}
		else {
			$result = $res_29;
			$this->pos = $pos_29;
		}
		$_35 = NULL;
		do {
			$_33 = NULL;
			do {
				$res_30 = $result;
				$pos_30 = $this->pos;
				$matcher = 'match_'.'atom'; $key = $matcher; $pos = $this->pos;
				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
				if ($subres !== FALSE) {
					$this->store( $result, $subres );
					$_33 = TRUE; break;
				}
				$result = $res_30;
				$this->pos = $pos_30;
				$matcher = 'match_'.'quoted_string'; $key = $matcher; $pos = $this->pos;
				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
				if ($subres !== FALSE) {
					$this->store( $result, $subres );
					$_33 = TRUE; break;
				}
				$result = $res_30;
				$this->pos = $pos_30;
				$_33 = FALSE; break;
			}
			while(0);
			if( $_33 === FALSE) { $_35 = FALSE; break; }
			$_35 = TRUE; break;
		}
		while(0);
		if( $_35 === FALSE) { $_37 = FALSE; break; }
		$_37 = TRUE; break;
	}
	while(0);
	if( $_37 === TRUE ) { return $this->finalise($result); }
	if( $_37 === FALSE) { return FALSE; }
}


/* operator_name: 'project' | 'assignee' | 'status' | 'color' | 'category' |
    'swimlane' | 'complexity' |
    'updated-after' | 'updated-within' | 'updated-before' |
    'due' | 'due-after'| 'due-before' | 'due-within' */
protected $match_operator_name_typestack = array('operator_name');
function match_operator_name ($stack = array()) {
	$matchrule = "operator_name"; $result = $this->construct($matchrule, $matchrule, null);
	$_90 = NULL;
	do {
		$res_39 = $result;
		$pos_39 = $this->pos;
		if (( $subres = $this->literal( 'project' ) ) !== FALSE) {
			$result["text"] .= $subres;
			$_90 = TRUE; break;
		}
		$result = $res_39;
		$this->pos = $pos_39;
		$_88 = NULL;
		do {
			$res_41 = $result;
			$pos_41 = $this->pos;
			if (( $subres = $this->literal( 'assignee' ) ) !== FALSE) {
				$result["text"] .= $subres;
				$_88 = TRUE; break;
			}
			$result = $res_41;
			$this->pos = $pos_41;
			$_86 = NULL;
			do {
				$res_43 = $result;
				$pos_43 = $this->pos;
				if (( $subres = $this->literal( 'status' ) ) !== FALSE) {
					$result["text"] .= $subres;
					$_86 = TRUE; break;
				}
				$result = $res_43;
				$this->pos = $pos_43;
				$_84 = NULL;
				do {
					$res_45 = $result;
					$pos_45 = $this->pos;
					if (( $subres = $this->literal( 'color' ) ) !== FALSE) {
						$result["text"] .= $subres;
						$_84 = TRUE; break;
					}
					$result = $res_45;
					$this->pos = $pos_45;
					$_82 = NULL;
					do {
						$res_47 = $result;
						$pos_47 = $this->pos;
						if (( $subres = $this->literal( 'category' ) ) !== FALSE) {
							$result["text"] .= $subres;
							$_82 = TRUE; break;
						}
						$result = $res_47;
						$this->pos = $pos_47;
						$_80 = NULL;
						do {
							$res_49 = $result;
							$pos_49 = $this->pos;
							if (( $subres = $this->literal( 'swimlane' ) ) !== FALSE) {
								$result["text"] .= $subres;
								$_80 = TRUE; break;
							}
							$result = $res_49;
							$this->pos = $pos_49;
							$_78 = NULL;
							do {
								$res_51 = $result;
								$pos_51 = $this->pos;
								if (( $subres = $this->literal( 'complexity' ) ) !== FALSE) {
									$result["text"] .= $subres;
									$_78 = TRUE; break;
								}
								$result = $res_51;
								$this->pos = $pos_51;
								$_76 = NULL;
								do {
									$res_53 = $result;
									$pos_53 = $this->pos;
									if (( $subres = $this->literal( 'updated-after' ) ) !== FALSE) {
										$result["text"] .= $subres;
										$_76 = TRUE; break;
									}
									$result = $res_53;
									$this->pos = $pos_53;
									$_74 = NULL;
									do {
										$res_55 = $result;
										$pos_55 = $this->pos;
										if (( $subres = $this->literal( 'updated-within' ) ) !== FALSE) {
											$result["text"] .= $subres;
											$_74 = TRUE; break;
										}
										$result = $res_55;
										$this->pos = $pos_55;
										$_72 = NULL;
										do {
											$res_57 = $result;
											$pos_57 = $this->pos;
											if (( $subres = $this->literal( 'updated-before' ) ) !== FALSE) {
												$result["text"] .= $subres;
												$_72 = TRUE; break;
											}
											$result = $res_57;
											$this->pos = $pos_57;
											$_70 = NULL;
											do {
												$res_59 = $result;
												$pos_59 = $this->pos;
												if (( $subres = $this->literal( 'due' ) ) !== FALSE) {
													$result["text"] .= $subres;
													$_70 = TRUE; break;
												}
												$result = $res_59;
												$this->pos = $pos_59;
												$_68 = NULL;
												do {
													$res_61 = $result;
													$pos_61 = $this->pos;
													if (( $subres = $this->literal( 'due-after' ) ) !== FALSE) {
														$result["text"] .= $subres;
														$_68 = TRUE; break;
													}
													$result = $res_61;
													$this->pos = $pos_61;
													$_66 = NULL;
													do {
														$res_63 = $result;
														$pos_63 = $this->pos;
														if (( $subres = $this->literal( 'due-before' ) ) !== FALSE) {
															$result["text"] .= $subres;
															$_66 = TRUE; break;
														}
														$result = $res_63;
														$this->pos = $pos_63;
														if (( $subres = $this->literal( 'due-within' ) ) !== FALSE) {
															$result["text"] .= $subres;
															$_66 = TRUE; break;
														}
														$result = $res_63;
														$this->pos = $pos_63;
														$_66 = FALSE; break;
													}
													while(0);
													if( $_66 === TRUE ) { $_68 = TRUE; break; }
													$result = $res_61;
													$this->pos = $pos_61;
													$_68 = FALSE; break;
												}
												while(0);
												if( $_68 === TRUE ) { $_70 = TRUE; break; }
												$result = $res_59;
												$this->pos = $pos_59;
												$_70 = FALSE; break;
											}
											while(0);
											if( $_70 === TRUE ) { $_72 = TRUE; break; }
											$result = $res_57;
											$this->pos = $pos_57;
											$_72 = FALSE; break;
										}
										while(0);
										if( $_72 === TRUE ) { $_74 = TRUE; break; }
										$result = $res_55;
										$this->pos = $pos_55;
										$_74 = FALSE; break;
									}
									while(0);
									if( $_74 === TRUE ) { $_76 = TRUE; break; }
									$result = $res_53;
									$this->pos = $pos_53;
									$_76 = FALSE; break;
								}
								while(0);
								if( $_76 === TRUE ) { $_78 = TRUE; break; }
								$result = $res_51;
								$this->pos = $pos_51;
								$_78 = FALSE; break;
							}
							while(0);
							if( $_78 === TRUE ) { $_80 = TRUE; break; }
							$result = $res_49;
							$this->pos = $pos_49;
							$_80 = FALSE; break;
						}
						while(0);
						if( $_80 === TRUE ) { $_82 = TRUE; break; }
						$result = $res_47;
						$this->pos = $pos_47;
						$_82 = FALSE; break;
					}
					while(0);
					if( $_82 === TRUE ) { $_84 = TRUE; break; }
					$result = $res_45;
					$this->pos = $pos_45;
					$_84 = FALSE; break;
				}
				while(0);
				if( $_84 === TRUE ) { $_86 = TRUE; break; }
				$result = $res_43;
				$this->pos = $pos_43;
				$_86 = FALSE; break;
			}
			while(0);
			if( $_86 === TRUE ) { $_88 = TRUE; break; }
			$result = $res_41;
			$this->pos = $pos_41;
			$_88 = FALSE; break;
		}
		while(0);
		if( $_88 === TRUE ) { $_90 = TRUE; break; }
		$result = $res_39;
		$this->pos = $pos_39;
		$_90 = FALSE; break;
	}
	while(0);
	if( $_90 === TRUE ) { return $this->finalise($result); }
	if( $_90 === FALSE) { return FALSE; }
}


/* operator: operator_name ':' keyword */
protected $match_operator_typestack = array('operator');
function match_operator ($stack = array()) {
	$matchrule = "operator"; $result = $this->construct($matchrule, $matchrule, null);
	$_95 = NULL;
	do {
		$matcher = 'match_'.'operator_name'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) { $this->store( $result, $subres ); }
		else { $_95 = FALSE; break; }
		if (substr($this->string,$this->pos,1) == ':') {
			$this->pos += 1;
			$result["text"] .= ':';
		}
		else { $_95 = FALSE; break; }
		$matcher = 'match_'.'keyword'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) { $this->store( $result, $subres ); }
		else { $_95 = FALSE; break; }
		$_95 = TRUE; break;
	}
	while(0);
	if( $_95 === TRUE ) { return $this->finalise($result); }
	if( $_95 === FALSE) { return FALSE; }
}

public function operator_operator_name ( &$self, $sub) {
        $self['operator']['name'] = $sub['text'];
    }

public function operator_keyword ( &$self, $sub) {
        $self['operator']['keyword'] = $sub['text'];
    }

/* op: or | not */
protected $match_op_typestack = array('op');
function match_op ($stack = array()) {
	$matchrule = "op"; $result = $this->construct($matchrule, $matchrule, null);
	$_100 = NULL;
	do {
		$res_97 = $result;
		$pos_97 = $this->pos;
		$matcher = 'match_'.'or'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) {
			$this->store( $result, $subres );
			$_100 = TRUE; break;
		}
		$result = $res_97;
		$this->pos = $pos_97;
		$matcher = 'match_'.'not'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) {
			$this->store( $result, $subres );
			$_100 = TRUE; break;
		}
		$result = $res_97;
		$this->pos = $pos_97;
		$_100 = FALSE; break;
	}
	while(0);
	if( $_100 === TRUE ) { return $this->finalise($result); }
	if( $_100 === FALSE) { return FALSE; }
}


/* or: 'OR' ] operand:term */
protected $match_or_typestack = array('or');
function match_or ($stack = array()) {
	$matchrule = "or"; $result = $this->construct($matchrule, $matchrule, null);
	$_105 = NULL;
	do {
		if (( $subres = $this->literal( 'OR' ) ) !== FALSE) { $result["text"] .= $subres; }
		else { $_105 = FALSE; break; }
		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
		else { $_105 = FALSE; break; }
		$matcher = 'match_'.'term'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) {
			$this->store( $result, $subres, "operand" );
		}
		else { $_105 = FALSE; break; }
		$_105 = TRUE; break;
	}
	while(0);
	if( $_105 === TRUE ) { return $this->finalise($result); }
	if( $_105 === FALSE) { return FALSE; }
}


/* not: 'NOT' ] operand:factor */
protected $match_not_typestack = array('not');
function match_not ($stack = array()) {
	$matchrule = "not"; $result = $this->construct($matchrule, $matchrule, null);
	$_110 = NULL;
	do {
		if (( $subres = $this->literal( 'NOT' ) ) !== FALSE) { $result["text"] .= $subres; }
		else { $_110 = FALSE; break; }
		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
		else { $_110 = FALSE; break; }
		$matcher = 'match_'.'factor'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) {
			$this->store( $result, $subres, "operand" );
		}
		else { $_110 = FALSE; break; }
		$_110 = TRUE; break;
	}
	while(0);
	if( $_110 === TRUE ) { return $this->finalise($result); }
	if( $_110 === FALSE) { return FALSE; }
}


/* factor: '(' > expr > ')' > | operator > | keyword > */
protected $match_factor_typestack = array('factor');
function match_factor ($stack = array()) {
	$matchrule = "factor"; $result = $this->construct($matchrule, $matchrule, null);
	$_132 = NULL;
	do {
		$res_112 = $result;
		$pos_112 = $this->pos;
		$_119 = NULL;
		do {
			if (substr($this->string,$this->pos,1) == '(') {
				$this->pos += 1;
				$result["text"] .= '(';
			}
			else { $_119 = FALSE; break; }
			if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
			$matcher = 'match_'.'expr'; $key = $matcher; $pos = $this->pos;
			$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
			if ($subres !== FALSE) { $this->store( $result, $subres ); }
			else { $_119 = FALSE; break; }
			if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
			if (substr($this->string,$this->pos,1) == ')') {
				$this->pos += 1;
				$result["text"] .= ')';
			}
			else { $_119 = FALSE; break; }
			if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
			$_119 = TRUE; break;
		}
		while(0);
		if( $_119 === TRUE ) { $_132 = TRUE; break; }
		$result = $res_112;
		$this->pos = $pos_112;
		$_130 = NULL;
		do {
			$res_121 = $result;
			$pos_121 = $this->pos;
			$_124 = NULL;
			do {
				$matcher = 'match_'.'operator'; $key = $matcher; $pos = $this->pos;
				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
				if ($subres !== FALSE) { $this->store( $result, $subres ); }
				else { $_124 = FALSE; break; }
				if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
				$_124 = TRUE; break;
			}
			while(0);
			if( $_124 === TRUE ) { $_130 = TRUE; break; }
			$result = $res_121;
			$this->pos = $pos_121;
			$_128 = NULL;
			do {
				$matcher = 'match_'.'keyword'; $key = $matcher; $pos = $this->pos;
				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
				if ($subres !== FALSE) { $this->store( $result, $subres ); }
				else { $_128 = FALSE; break; }
				if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
				$_128 = TRUE; break;
			}
			while(0);
			if( $_128 === TRUE ) { $_130 = TRUE; break; }
			$result = $res_121;
			$this->pos = $pos_121;
			$_130 = FALSE; break;
		}
		while(0);
		if( $_130 === TRUE ) { $_132 = TRUE; break; }
		$result = $res_112;
		$this->pos = $pos_112;
		$_132 = FALSE; break;
	}
	while(0);
	if( $_132 === TRUE ) { return $this->finalise($result); }
	if( $_132 === FALSE) { return FALSE; }
}

public function factor_STR ( &$self, $sub ) {
        $self['child'] = $sub;
    }

/* term: factor+ */
protected $match_term_typestack = array('term');
function match_term ($stack = array()) {
	$matchrule = "term"; $result = $this->construct($matchrule, $matchrule, null);
	$count = 0;
	while (true) {
		$res_134 = $result;
		$pos_134 = $this->pos;
		$matcher = 'match_'.'factor'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) { $this->store( $result, $subres ); }
		else {
			$result = $res_134;
			$this->pos = $pos_134;
			unset( $res_134 );
			unset( $pos_134 );
			break;
		}
		$count++;
	}
	if ($count >= 1) { return $this->finalise($result); }
	else { return FALSE; }
}

public function term_factor ( &$self, $sub ) {
        $self['child'][] = $sub['child'];
    }

/* expr: (not | term) > (or | not | term)* */
protected $match_expr_typestack = array('expr');
function match_expr ($stack = array()) {
	$matchrule = "expr"; $result = $this->construct($matchrule, $matchrule, null);
	$_154 = NULL;
	do {
		$_140 = NULL;
		do {
			$_138 = NULL;
			do {
				$res_135 = $result;
				$pos_135 = $this->pos;
				$matcher = 'match_'.'not'; $key = $matcher; $pos = $this->pos;
				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
				if ($subres !== FALSE) {
					$this->store( $result, $subres );
					$_138 = TRUE; break;
				}
				$result = $res_135;
				$this->pos = $pos_135;
				$matcher = 'match_'.'term'; $key = $matcher; $pos = $this->pos;
				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
				if ($subres !== FALSE) {
					$this->store( $result, $subres );
					$_138 = TRUE; break;
				}
				$result = $res_135;
				$this->pos = $pos_135;
				$_138 = FALSE; break;
			}
			while(0);
			if( $_138 === FALSE) { $_140 = FALSE; break; }
			$_140 = TRUE; break;
		}
		while(0);
		if( $_140 === FALSE) { $_154 = FALSE; break; }
		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
		while (true) {
			$res_153 = $result;
			$pos_153 = $this->pos;
			$_152 = NULL;
			do {
				$_150 = NULL;
				do {
					$res_143 = $result;
					$pos_143 = $this->pos;
					$matcher = 'match_'.'or'; $key = $matcher; $pos = $this->pos;
					$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
					if ($subres !== FALSE) {
						$this->store( $result, $subres );
						$_150 = TRUE; break;
					}
					$result = $res_143;
					$this->pos = $pos_143;
					$_148 = NULL;
					do {
						$res_145 = $result;
						$pos_145 = $this->pos;
						$matcher = 'match_'.'not'; $key = $matcher; $pos = $this->pos;
						$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
						if ($subres !== FALSE) {
							$this->store( $result, $subres );
							$_148 = TRUE; break;
						}
						$result = $res_145;
						$this->pos = $pos_145;
						$matcher = 'match_'.'term'; $key = $matcher; $pos = $this->pos;
						$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
						if ($subres !== FALSE) {
							$this->store( $result, $subres );
							$_148 = TRUE; break;
						}
						$result = $res_145;
						$this->pos = $pos_145;
						$_148 = FALSE; break;
					}
					while(0);
					if( $_148 === TRUE ) { $_150 = TRUE; break; }
					$result = $res_143;
					$this->pos = $pos_143;
					$_150 = FALSE; break;
				}
				while(0);
				if( $_150 === FALSE) { $_152 = FALSE; break; }
				$_152 = TRUE; break;
			}
			while(0);
			if( $_152 === FALSE) {
				$result = $res_153;
				$this->pos = $pos_153;
				unset( $res_153 );
				unset( $pos_153 );
				break;
			}
		}
		$_154 = TRUE; break;
	}
	while(0);
	if( $_154 === TRUE ) { return $this->finalise($result); }
	if( $_154 === FALSE) { return FALSE; }
}

public function expr_STR ( &$self, $sub ) {
        $self['child'][] = $sub;
    }


}

