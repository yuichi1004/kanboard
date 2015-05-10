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

/*!* KQLParser

crlf: /\r\n/

atom: /( (&[A-Za-z]+;) | (&\#(xX)?[A-Fa-f0-9]+;) | ([^\x00-\x1F\x20()<>@,;:\[\]\\".]) )+/

qtext-chars: /[^"\\\x0D]+/

quoted-pair: /\\./

lwsp-char: " " | "\t"

linear-white-space: (crlf? lwsp-char)+

qtext: linear-white-space | qtext-chars

quoted-string: .'"' ( quoted-pair | qtext )* .'"'

keyword: !op (atom | quoted-string)

operator_name: 'project' | 'assignee' | 'status' | 'color' | 'category' |
    'swimlane' | 'complexity' |
    'updated-after' | 'updated-within' | 'updated-before' |
    'due' | 'due-after'| 'due-before' | 'due-within'

operator: operator_name ':' keyword
    function operator_name( &$self, $sub) {
        $self['operator']['name'] = $sub['text'];
    }
    function keyword( &$self, $sub) {
        $self['operator']['keyword'] = $sub['text'];
    }

op: or | not

or: 'OR' ] operand:term

not: 'NOT' ] operand:factor

factor: '(' > expr > ')' > | operator > | keyword >
    function *( &$self, $sub ) {
        $self['child'] = $sub;
    }

term: factor+
    function factor( &$self, $sub ) {
        $self['child'][] = $sub['child'];
    }

expr: (not | term) > (or | not | term)*
    function *( &$self, $sub ) {
        $self['child'][] = $sub;
    }
*/
}

