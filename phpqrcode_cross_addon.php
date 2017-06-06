<?php

function cross($size) {

  // manipulate resulting size here
  $factor = $size * 0.008;

  $offset = $size /2 - 10 * $factor;

  $a = 0.7 * $factor + $offset;
  $b = 1.6 * $factor + $offset;
  $c = 18.3 * $factor + $offset;
  $d = 19.1 * $factor + $offset;

  $ns_x = 8.3 * $factor + $offset;
  $ns_y = 4 * $factor + $offset;
  $ns_width = 3.3 * $factor;
  $ns_height = 11 * $factor;

  $os_x = 4.4 * $factor + $offset;
  $os_y = 7.9 * $factor + $offset;
  $os_width  = $ns_height;
  $os_height = $ns_width;

  $strokewith = 1.4357 * $factor;

  $svg = "\n";
  $svg .= '<style type="text/css">';
  $svg .= "\n";
  $svg .= '    .st0{fill:#FFFFFF;}';
  $svg .= "\n";
  $svg .= "    .st1{fill:none;stroke:#FFFFFF;stroke-width:$strokewith;stroke-miterlimit:10;}";
  $svg .= "\n";
  $svg .= '</style>';
  $svg .= "\n";
  // black background
  $svg .= "<polygon points=\"$c,$a $b,$a $a,$a $a,$b $a,$c $a,$d $b,$d $c,$d $d,$d $d,$c $d,$b $d,$a \"/>";
  $svg .= "\n";
  // NS part of cross
  $svg .= "<rect x=\"$ns_x\" y=\"$ns_y\" class=\"st0\" width=\"$ns_width\" height=\"$ns_height\"/>";
  $svg .= "\n";
  // EW part of cross
  $svg .= "<rect x=\"$os_x\" y=\"$os_y\" class=\"st0\" width=\"$os_width\" height=\"$os_height\"/>";
  $svg .= "\n";
  // white border
  $svg .= "<polygon class=\"st1\" points=\"$a,$b $a,$c $a,$d $b,$d $c,$d $d,$d $d,$c $d,$b $d,$a $c,$a $b,$a $a,$a \"/>";
  $svg .= "\n";

  return $svg;
}

?>
