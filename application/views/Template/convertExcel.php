<?php
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=ResultData.xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);

$myData = "<table><thead><tr>
		<th>No</th>
		<th>Nama</th>
		<th>Gemder</th>
		<th>Tinggi Badan</th>
		<th>Berat Badan</th>
		<th>Result</th>
		</tr></thead>
		<tbody>";
		$count = 1;
foreach($posts as $post)
{
	if($post->gender == "1") 
	{ 
		$dataGender = "Laki-Laki"; 
	} 
	else 
	{ 
		$dataGender = "Perempuan"; 
	}
	$myData .= "<tr><td>".$post->id."</td>".
					"<td>".$post->nama."</td>".
					"<td>".$dataGender."</td>".
					"<td>".$post->bb."</td>".
					"<td>".$post->tb."</td>".
					"<td>".$hasil[$count-1]."</td>".
				"</tr>";
	$count++;
}
$myData .= "</tbody></table>";

echo $myData;

?>