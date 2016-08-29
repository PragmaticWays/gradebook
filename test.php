<?php require('core/init.php'); ?>
<?php

$curl = new Curl();
$html = $curl->get("http://web.ccis.edu/syllabi/online/fa1/ciss/243.aspx");

// Find assignments table
$html = explode("<legend><h3>Schedule of Due Dates</h3></legend>", $html);

// Find end of assignments table
$html = explode("</tr>
                            </tbody>                                    
                        </table>
                        </div>
                </div>
                </fieldset>
                <br />", $html[1]);
			
// Capture each week instance in assignments table ($week[1] = Week 1, $week[2] = Week 2, ..., $week[8] = Week 8)			
$week = explode("<th colspan='3' valign='middle' style='text-align: center;'>", $html[0]);

breakWeek($week[1]);
breakWeek($week[2]);
breakWeek($week[3]);
breakWeek($week[4]);
breakWeek($week[5]);
breakWeek($week[6]);
breakWeek($week[7]);
breakWeek($week[8]);


function breakWeek($str) {
	$str = explode("</th>", $str, 5);
	
	// get week
	$currWeek = htmlspecialchars($str[0]);
	echo "<strong>".$currWeek."</strong><br>";
	
	// Get all assignments after table header
	$str = multiexplode(array("<td>","</td>","style='border-bottom: none;'>"), $str[4]);
	
	// days array used for validation - some assignments use due date of previous assignment and will not be entered for this instance, this array helps to catch those instances
	$duedate = ""; 
	$days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Wednesday/Sunday", "Wednesday/Saturday", "Thursday/Sunday", "Thursday/Saturday");
	
	// Get all 3 pieces of data from every assignment
	for ($i = 1; $i < sizeof($str); $i = $i+6) {
		
		// Get assignment name
		$assignName = htmlspecialchars($str[$i]);
		if (stristr($assignName, htmlentities("<"))) break;
		echo $assignName."\t";
		
		// Get assignment point value
		$pnts = htmlspecialchars($str[$i+2]);
		if ($pnts == "N/A") $pnts = 0;
		echo $pnts."\t";
		
		// Get assignment due date
		// If duedate has not been set, get assignment at index
		if ($duedate == "") {
			$duedate = htmlspecialchars($str[$i+4]);
		// Make sure duedate index does not go past array length
		} else if (sizeof($str) > $i+4) {
			// If duedate is not in valid days array, push index back by 2
			if (!in_array(htmlspecialchars($str[$i+4]), $days)) {
				$i = $i - 2;
			// If all else is good, get new duedate at index
			} else {
				$duedate = htmlspecialchars($str[$i+4]);
			}
		}
		echo $duedate."<br>";
	}
	echo "<hr>";
}

function multiexplode ($delimiters,$string) {
   
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}
?>