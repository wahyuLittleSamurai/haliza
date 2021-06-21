<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stunting extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
         parent::__construct();
		 
		 $this->load->helper('date'); 
		 $this->load->helper(array('url','form'));
		 $this->load->library('session');
		 $this->load->database();
		 $this->load->model('m_account');

     }
	 public function GetPusatCluster()
	 {
		$result["result"] = $this->m_account->getPusatCluster();
		echo json_encode($result);
	 }
	 public function ConvertToExcel()
	 {
		 $this->data['hasil'] = $this->stuntingNoTbl();
		 $this->data['posts'] = $this->m_account->getDataAnak();
			
		$this->load->view('Template/convertExcel', $this->data);
	 }
	public function SettingFuzzy()
     {
     	$result["data"] = $this->m_account->getSetting();
     	$urlMain['urlMain'] = 'Setting Fuzzy';
		$urlMain["content"] = $this->load->view('SettingFuzzy', $result, true);
		$this->load->view('Template/Main', $urlMain);	
     }
	 public function EditSetting()
     {
     	$data = array(
     		"jmlCluster" => $this->input->post("jmlCluster"),
     		"pangkat" => $this->input->post("pangkat"),
     		"maxIterasi" => $this->input->post("maxIterasi"),
     		"errorTerkecil" => $this->input->post("errorTerkecil")
     	);
     	
     	$result = $this->m_account->editSetting($data);
     	
     	redirect("/Stunting/SettingFuzzy");
     	
     	
     }
	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->load->view('v_login');
	}
	public function index()
	{
		if($this->session->userdata('user') == '')
		{
			$this->load->view('v_login');
		}
		else
		{
			redirect("Stunting/dashboard");
		}
	}
	public function login()
	{
		$data["username"] = $this->input->post('username');
		$data["password"] = $this->input->post('password');
		if(!empty($data["username"]) && !empty($data["password"]) )
		{
			$getUser = $this->m_account->login($data);
			if($getUser > 0)
			{
				$this->session->set_userdata('user', $data["username"]);
				$this->dashboard();
			}
			else
			{
				$this->index();
			}
		}
	}
	public function dashboard()
	{
		$urlMain['urlMain'] = 'Dashboard';
		$urlMain["content"] = $this->load->view('Home', NULL, true);
		$this->load->view('Template/Main', $urlMain);	
	}
	
	public function tenagaKesehatan()
	{
		if($this->session->userdata('user') == 'admin')
		{
			$this->data['posts'] = $this->m_account->getTenagaKesehatan();
			$this->data['tableTittle'] = "Tabel Tenaga Kerja";
			$data['content'] = $this->load->view('v_dataTenagaKesehatan', $this->data, true);
			
			$this->load->view('Template/Main', $data);
		}
		else{
			redirect("Stunting");
		}
	}
	
	public function addTenagaKesehatan()
	{
		$data["username"] = $this->input->post('username');
		$data["password"] = $this->input->post('password');
		if(!empty($data["username"]) && !empty($data["password"]) )
		{
			$this->m_account->addTenagaKesehatan($data);
			$this->tenagaKesehatan();
		}
	}
	
	public function editTenagaKesehatan()
	{
		$data["id"] = $this->input->post('idUser');
		$data["username"] = $this->input->post('username');
		$data["password"] = $this->input->post('password');
		if(!empty($data["username"]) && !empty($data["password"]) )
		{
			$this->m_account->editTenagaKesehatan($data);
			$this->tenagaKesehatan();
		}
	}
	
	public function deleteTenagaKesehatan($data)
	{
		$this->m_account->deleteTenagaKesehatan($data);
		$this->tenagaKesehatan();
		
	}
	
	public function addDataAnak()
	{
		$data["nama"] = $this->input->post('nama');
		$data["gender"] = $this->input->post('gender');
		$data["umur"] = $this->input->post('umur');
		$data["bb"] = $this->input->post('bb');
		$data["tb"] = $this->input->post('tb');
		if(!empty($data["nama"]) && !empty($data["gender"]) && !empty($data["umur"]) && !empty($data["bb"]) && !empty($data["tb"]) )
		{
			$this->m_account->addDataAnak($data);
			$this->dataAnak(true);
		}
	}
	public function editDataAnak()
	{
		$data["id"] = $this->input->post('id');
		$data["nama"] = $this->input->post('nama');
		$data["gender"] = $this->input->post('gender');
		$data["umur"] = $this->input->post('umur');
		$data["bb"] = $this->input->post('bb');
		$data["tb"] = $this->input->post('tb');
		if(!empty($data["nama"]) && !empty($data["gender"]) && !empty($data["umur"]) && !empty($data["bb"]) && !empty($data["tb"]) )
		{
			$this->m_account->editDataAnak($data);
			$this->dataAnak();
		}
	}
	public function deleteDataAnak($data)
	{
		$this->m_account->deleteDataAnak($data);
		//$this->dataAnak();
		redirect("Stunting/dataAnak");
	}
	
	function randomData($cluster)
	{
		$target = 100;
		$n = $cluster;
		$addends = array();
		$results = array();
		while ($n) 
		{
			if (1 < $n--) 
			{
					$addend = rand(1, $target - ($n - 1));
					$target -= $addend;
					$addends[] = $addend;
			} 
			else 
			{
					$addends[] = $target;
			}
		}
		foreach($addends as $add)
		{
			$results[] = $add / 100;
		}
		return $results ;
	}
	function newRandom()
	{
		$data = rand(1, 99);
		$data = $data / 100;
		return $data;
	}
	public function newcalcStunting()
	{
		
/*		
$randData = array(
array("0.508685702","0.130153266","0.999167462","0.558648655"),
array("0.926765131","0.556507672","0.784142826","0.279297982"),
array("0.158462169","0.632922015","0.464803963","0.242849691"),
array("0.904225079","0.819980986","0.397657496","0.040482236"),
array("0.180076557","0.238190084","0.897804225","0.776065752"),
array("0.739508052","0.83070094","0.925763406","0.182337673"),
array("0.556332379","0.575638228","0.57792544","0.510342904"),
array("0.05312943","0.203640119","0.145332464","0.404991894"),
array("0.515888681","0.615167577","0.074798237","0.62672659"),
array("0.481302786","0.578913955","0.40099458","0.29639083"),
array("0.062988352","0.870093256","0.418413916","0.863243745"),
array("0.141597747","0.644202499","0.251298105","0.06447285"),
array("0.092510518","0.549963631","0.388017066","0.652166532"),
array("0.139485624","0.814028314","0.435831667","0.975093261"),
array("0.995173025","0.543025453","0.514482982","0.862699922"),
array("0.321435519","0.097345172","0.012295771","0.270530752"),
array("0.523761247","0.343415122","0.225271869","0.961795639"),
array("0.921638719","0.702579163","0.546083678","0.055274451"),
array("0.358772614","0.584022087","0.2760549","0.656911146"),
array("0.89749916","0.484168831","0.23735193","0.386186959"),
array("0.426983237","0.667612558","0.255096992","0.973620911"),
array("0.815575751","0.063576649","0.349640895","0.725471118"),
array("0.325203746","0.821545317","0.050168272","0.004809564"),
array("0.105310213","0.257835592","0.742246364","0.112596695"),
array("0.307574301","0.613284673","0.196479746","0.684814789"),
array("0.826263155","0.504809162","0.170895906","0.255137619"),
array("0.38806731","0.184816674","0.412068846","0.39015381"),
array("0.073857196","0.445500082","0.728986247","0.584106271"),
array("0.677163374","0.931927935","0.588974306","0.190917001"),
array("0.599553942","0.074252269","0.248569176","0.214361108"),
array("0.449573779","0.458230612","0.228230164","0.816525802"),
array("0.703903229","0.468991787","0.932497448","0.849265859"),
array("0.048278416","0.877823793","0.605815735","0.376851207"),
array("0.926176108","0.657939423","0.879851348","0.115821424"),
array("0.532641203","0.685477633","0.011176884","0.158489701"),
array("0.268131079","0.445782708","0.405668446","0.838223244"),
array("0.934412595","0.317090772","0.309006563","0.533392978"),
array("0.152058228","0.387753206","0.557125732","0.748493667"),
array("0.866760775","0.711761719","0.713509092","0.901302236"),
array("0.113431497","0.112076013","0.699931982","0.29950068"),
array("0.043350239","0.115741775","0.951186822","0.947952558"),
array("0.63795113","0.463693788","0.139994291","0.879560907"),
array("0.431139561","0.576902127","0.525132764","0.003447763"),
array("0.081571948","0.227597263","0.123580968","0.73537734"),
array("0.213606345","0.239234985","0.682158884","0.736058425"),
array("0.345781064","0.006414862","0.024517952","0.469509584"),
array("0.238958026","0.048541186","0.482881973","0.906552323"),
array("0.197210579","0.887723997","0.258689988","0.907772999"),
array("0.975690497","0.027256429","0.277994895","0.187323666"),
array("0.798372356","0.562241327","0.839742469","0.154806833"),
array("0.083076704","0.946917217","0.458737387","0.735700078"),
array("0.777162194","0.092417368","0.883736431","0.766398399"),
array("0.498891199","0.78221903","0.55199867","0.305949399"),
array("0.934874703","0.425734732","0.867430134","0.68419166")
);

*/
		$randData = array();

		$query = "SELECT * FROM tblAnak";
		$resultData = $this->db->query($query)->result();
		$dataMax = 0; $dataMin = 10000;
		$var1 = 0.8; $var2 = 0.1;
		$dataNorm = array();  $dataMiu = array();
		$miuTotal = array(); $pusatCluster = array();
		$dataMiu2 = array(); //$epsilon = 0.00001;
		
		$query="SELECT errorTerkecil FROM tblsetting";
		$result = $this->db->query($query)->row()->errorTerkecil;
		$epsilon = $result;
		
		$query = "SELECT maxIterasi from tblsetting";
		$maxIterasi = $this->db->query($query)->row()->maxIterasi;
		
		$flagLooping = false;
		
		foreach($resultData as $data)
		{
			$dataMin = min($data->umur, $data->gender, $data->bb, $data->tb, $dataMin);
			$dataMax = max($data->umur, $data->gender, $data->bb, $data->tb, $dataMax);
		}
		echo "Data Min: ". $dataMin; echo "<br>";
		echo "Data Max: ". $dataMax; echo "<br>";
		
		$dataAnak = $this->m_account->getDataAnak();
		echo "<body style='text-align:center;'>
				<style>
					th, td{
						padding: 10px;
					}
				
				</style>
	   
	   ";
	   echo "<h3>Tabel Data Anak</h3>";
	   echo "<table cellpadding='0' cellspacing='0' border='1' style='margin-left:auto; margin-right:auto;'> 
			<thead>
			  <tr>
				<th>Umur</th>
				<th>Gender</th>
				<th>BB</th>
				<th>TB</th>
				<th colspan='4'>Normalisasi</th>
				<th colspan='4'>Data Cluster</th>
			  </tr>
			</thead>
			<tbody>";
		$counting = 0;
		foreach($dataAnak as $anak)
		{
			echo "<tr>";
			echo "<td>".$anak->umur."</td>";
			echo "<td >".$anak->gender."</td>";
			echo "<td >".$anak->bb."</td>";
			echo "<td >".$anak->tb."</td>";
			
			$dataNorm[$counting][0] = round(($var1 * ($anak->umur - $dataMin) / ($dataMax - $dataMin) + $var2) , 5);
			$dataNorm[$counting][1] = round(($var1 * ($anak->gender - $dataMin) / ($dataMax - $dataMin) + $var2) , 5);
			$dataNorm[$counting][2] = round(($var1 * ($anak->bb - $dataMin) / ($dataMax - $dataMin) + $var2) , 5);
			$dataNorm[$counting][3] = round(($var1 * ($anak->tb - $dataMin) / ($dataMax - $dataMin) + $var2) , 5);
			echo "<td >".$dataNorm[$counting][0]."</td>";
			echo "<td >".$dataNorm[$counting][1]."</td>";
			echo "<td >".$dataNorm[$counting][2]."</td>";
			echo "<td >".$dataNorm[$counting][3]."</td>";
			 
			$randData[$counting][0] = $this->newRandom();
			$randData[$counting][1] = $this->newRandom();
			$randData[$counting][2] = $this->newRandom();
			$randData[$counting][3] = $this->newRandom();
			
			$dataSum[$counting] = $randData[$counting][0] + $randData[$counting][1] + $randData[$counting][2] + $randData[$counting][3] ;
			$randData[$counting][0] = round(($randData[$counting][0] / $dataSum[$counting]) , 5);
			$randData[$counting][1] = round(($randData[$counting][1] / $dataSum[$counting]) , 5);
			$randData[$counting][2] = round(($randData[$counting][2] / $dataSum[$counting]) , 5);
			$randData[$counting][3] = round(($randData[$counting][3] / $dataSum[$counting]) , 5);
			
			echo "<td >".$randData[$counting][0]."</td>";
			echo "<td >".$randData[$counting][1]."</td>";
			echo "<td >".$randData[$counting][2]."</td>";
			echo "<td >".$randData[$counting][3]."</td>";
			
			echo "<tr>";
			
			$counting++;
		}
		
		echo "</tbody></table>";
		
		$iterasi = 1;
		while($flagLooping == false)
		{
		
			echo "<h3>Iterasi ".$iterasi."</h3>";
			echo "<table cellpadding='0' cellspacing='0' border='1' style='margin-left:auto; margin-right:auto;'> 
			<thead>
			  <tr>
				<th>MiU C1</th>
				<th>MiU1</th>
				<th>MiU2</th>
				<th>MiU3</th>
				<th>MiU4</th>
				<th>MiU C2</th>
				<th>MiU1</th>
				<th>MiU2</th>
				<th>MiU3</th>
				<th>MiU4</th>
				<th>MiU C3</th>
				<th>MiU1</th>
				<th>MiU2</th>
				<th>MiU3</th>
				<th>MiU4</th>
				<th>MiU C4</th>
				<th>MiU1</th>
				<th>MiU2</th>
				<th>MiU3</th>
				<th>MiU4</th>
			  </tr>
			</thead>
			<tbody>";
			
			for($x = 0; $x < count($dataNorm); $x++)
			{
				echo "<tr>";
				for($clus = 0; $clus < count($randData[$x]); $clus++)
				{
					$dataMiu[$x][0] = round(pow($randData[$x][$clus] , 2), 5);
					echo "<td >".$dataMiu[$x][0]."</td>";		
					$dataMiu2[$x][$clus] = $dataMiu[$x][0];
					
					if(empty($miuTotal[$clus][0])) { $miuTotal[$clus][0] = 0; }
					$miuTotal[$clus][0] += $dataMiu[$x][0];
					
					for($y = 0; $y < count($dataNorm[$x]); $y++)
					{
						$dataMiu[$x][$y + 1] = round($dataMiu[$x][0] * $dataNorm[$x][$y], 5);
						echo "<td >".$dataMiu[$x][$y + 1]."</td>";
						
						if(empty($miuTotal[$clus][$y + 1])) { $miuTotal[$clus][$y + 1] = 0; }
						$miuTotal[$clus][$y + 1] += $dataMiu[$x][$y + 1];
					
					}
				}
				/* tampil total miu */
				if($x == (count($dataNorm) -1))
				{
					echo "<tr><td colspan='20'>Total Miu</td></tr>";
					//echo count($miuTotal) . " >> " . count($miuTotal[0]) . "<br>";
					for($a = 0; $a < count($miuTotal); $a++)
					{
						for($b=0; $b < count($miuTotal[$a]); $b++)
						{
							echo "<td>".$miuTotal[$a][$b]."</td>";
						}
					}
					echo "</tr>";
				}
				
				
				echo "<tr>";
				
			}
			
			echo "</tbody></table>";
			
			
			/* calculasi pusat cluster */
			echo "<br><h3>Pusat Cluster</h3>";
			echo "<table cellpadding='0' cellspacing='0' border='1' style='margin-left:auto; margin-right:auto;'> 
			<thead>
			  <tr>
				<th>Cluster 1</th>
				<th>Cluster 2</th>
				<th>Cluster 3</th>
				<th>Cluster 4</th>
				
			  </tr>
			</thead>
			<tbody>";
			
			$queryCluster = "INSERT INTO tblpusatclsuter(cluster1, cluster2, cluster3,cluster4) VALUES";
			
			//echo count($miuTotal) . " >> " . count($miuTotal[0]) . "<br>";
			for($a = 0; $a < count($miuTotal); $a++)
			{
				echo "<tr>";
				$queryCluster .= "(";
				for($b=1; $b < count($miuTotal[$a]); $b++)
				{
					$pusatCluster[$a][$b - 1] = round($miuTotal[$a][$b] / $miuTotal[$a][0], 5);
					echo "<td >".$pusatCluster[$a][$b - 1]."</td>";
					$queryCluster .= "'".$pusatCluster[$a][$b-1]."',";
				}
				$queryCluster = substr($queryCluster, 0, -1);
				$queryCluster .= "),";
				echo "</tr>";
			}
			echo "</tr></tbody></table>";
			
			$queryCluster = substr($queryCluster, 0, -1);
			$this->db->query($queryCluster);
			
			/* calculasi fungsi objective */
			$dataL = array(); $resultObjective = null;
			$dataL_1 = array(); $totalL = array();
			echo "<br><h3>Fungsi Objective </h3>";
			echo "<table cellpadding='0' cellspacing='0' border='1' style='margin-left:auto; margin-right:auto;'> 
			<thead>
			  <tr>
				<th>Miu^2 1</th>
				<th>Miu^2 2</th>
				<th>Miu^2 3</th>
				<th>Miu^2 4</th>
				<th>LT 1</th>
				<th>LT 2</th>
				<th>LT 3</th>
				<th>LT 4</th>
				<th>LT Total</th>
				
			  </tr>
			</thead>
			<tbody>";
			//echo count($miuTotal) . " >> " . count($miuTotal[0]) . "<br>";
			for($x = 0; $x < count($dataMiu2); $x++)
			{
				echo "<tr>";
				for($y = 0; $y < count($dataNorm[$x]); $y++)
				{
					echo "<td >" . $dataMiu2[$x][$y] . "</td>";
				}
				for($y = 0; $y < count($dataNorm[$x]); $y++)
				{
					for($z = 0; $z < count($pusatCluster)-1; $z++)
					{
						if(empty($dataL[$x][$y])) {$dataL[$x][$y] = 0;}
						$dataL[$x][$y] += pow($dataNorm[$x][$z] - $pusatCluster[$y][$z], 2);	
					}
					$dataL[$x][$y] = $dataL[$x][$y] * $dataMiu2[$x][$y];
					$dataL_1[$x][$y] = pow($dataL[$x][$y] / $dataMiu2[$x][$y] , -1);
					
					if(empty($totalL[$x])) { $totalL[$x] = 0; }
					$totalL[$x] += $dataL_1[$x][$y];
					
					$resultObjective += $dataL[$x][$y];
					echo "<td  >" . $dataL[$x][$y] . "</td>";
					
				}
				echo "<td>" . $totalL[$x] . "</td>";
				echo "</tr>";
			}
			echo "</tr></tbody></table>";
			
			/* result fungsi objective */
			echo "<h3>Total Fungsi Objective = " . $resultObjective . "</h3>";
			if($resultObjective <= $epsilon)
			{
				$flagLooping = true;
			}
			
			/* new Random */
			for($x = 0; $x < count($dataL_1); $x++)
			{
				for($y = 0; $y < count($dataL_1[$x]); $y++)
				{
					$randData[$x][$y] = $dataL_1[$x][$y] / $totalL[$x];
				}				
			}
			
			if($iterasi == $maxIterasi)
			{
				$flagLooping = true;
			}
			
			$iterasi++;
		
		}
		
		
		/* rank pusat cluster */
		$totalRangking = array(); $ranking = array();
		
		echo "<br><h3>Table Ranking Pusat Cluster</h3>";
			echo "<table cellpadding='0' cellspacing='0' border='1' style='margin-left:auto; margin-right:auto;'> 
			<thead>
			  <tr>
				<th>Cluster 1</th>
				<th>Cluster 2</th>
				<th>Cluster 3</th>
				<th>Cluster 4</th>
				<th>Total</th>
				
			  </tr>
			</thead>
			<tbody>";
			
		for($x = 0; $x < count($pusatCluster); $x++)
		{
			echo "<tr>";
			for($y = 0; $y < count($pusatCluster[$x]); $y++)
			{
				echo "<td>" . $pusatCluster[$x][$y] . "</td>";
				if(empty($totalRangking[$x]) ) { $totalRangking[$x] = 0; }
				$totalRangking[$x] += $pusatCluster[$x][$y];
			}
			echo "<td>" . $totalRangking[$x] . "</td>";
			echo "</tr>";
		}
		echo "</tbody></table>";
		echo "<br><h3>Ranking</h3>";
			echo "<table cellpadding='0' cellspacing='0' border='1' style='margin-left:auto; margin-right:auto;'> 
			<thead>
			  <tr>
				<th>Total Cluster</th>
				<th>Result Ranking</th>
				
			  </tr>
			</thead>
			<tbody>";
		
		$rangking = $totalRangking;
		$indexRanking = array();
		rsort($rangking);
		for($index = 0; $index < count($totalRangking) ; $index++)
		{
			$indexRanking[$index] = array_search($totalRangking[$index], $rangking) + 1;
			echo "<tr><td>" . $totalRangking[$index] . " </td><td> " .$indexRanking[$index] . "</td></tr>";
		}
		echo "</tbody></table>";
		
		/* pengambilan keputusan */
		$setNamaCluster = array("Tinggi", "Normal", "Pendek", "Sangat Pendek");
		$maxRand = array(); $resultCluster = array();
		echo "<br><h3>Table Hasil Perhitungan dan Pengambilan Keputusan</h3>";
			echo "<table cellpadding='0' cellspacing='0' border='1' style='margin-left:auto; margin-right:auto;'> 
			<thead>
			  <tr>
				<th>MiU pada Cluster 1</th>
				<th>MiU pada Cluster 1</th>
				<th>MiU pada Cluster 1</th>
				<th>MiU pada Cluster 1</th>
				<th>MAX</th>
				<th>Result</th>
				
			  </tr>
			</thead>
			<tbody>";
		for($x = 0; $x < count($randData); $x++)
		{
			echo "<tr>";
			$maxRand[$x] = 0;
			for($y = 0; $y < count($randData[$x]); $y++)
			{
				echo "<td>" . $randData[$x][$y] . "</td>";
				
				if($randData[$x][$y] > $maxRand[$x])
				{
					$maxRand[$x] = $randData[$x][$y];
				}
				if($y == (count($randData[$x]) - 1))
				{
					$resultCluster[$x] = array_search($maxRand[$x], $randData[$x]);
					echo "<td>" . $maxRand[$x] . "</td>";
					echo "<td>" . $setNamaCluster[$resultCluster[$x]] . "</td>";
				}
				
			}
			echo "</tr>";
		}
		echo "</tbody></table>";
		echo "</body>";
	}
	
	/* stunting tanpa table */
	public function stuntingNoTbl()
	{
		$randData = array();
			
		$query = "SELECT * FROM tblAnak";
		$resultData = $this->db->query($query)->result();
		$dataMax = 0; $dataMin = 10000;
		$var1 = 0.8; $var2 = 0.1;
		$dataNorm = array();  $dataMiu = array();
		$miuTotal = array(); $pusatCluster = array();
		$dataMiu2 = array(); //$epsilon = 0.00001;
		$flagLooping = false;
	
		$query="SELECT errorTerkecil FROM tblsetting";
		$result = $this->db->query($query)->row()->errorTerkecil;
		$epsilon = $result;
		
		$query = "SELECT maxIterasi from tblsetting";
		$maxIterasi = $this->db->query($query)->row()->maxIterasi;
		
		
		foreach($resultData as $data)
		{
			$dataMin = min($data->umur, $data->gender, $data->bb, $data->tb, $dataMin);
			$dataMax = max($data->umur, $data->gender, $data->bb, $data->tb, $dataMax);
		}
		
		$dataAnak = $this->m_account->getDataAnak();
		$counting = 0;
		foreach($dataAnak as $anak)
		{
			
			$dataNorm[$counting][0] = round(($var1 * ($anak->umur - $dataMin) / ($dataMax - $dataMin) + $var2) , 5);
			$dataNorm[$counting][1] = round(($var1 * ($anak->gender - $dataMin) / ($dataMax - $dataMin) + $var2) , 5);
			$dataNorm[$counting][2] = round(($var1 * ($anak->bb - $dataMin) / ($dataMax - $dataMin) + $var2) , 5);
			$dataNorm[$counting][3] = round(($var1 * ($anak->tb - $dataMin) / ($dataMax - $dataMin) + $var2) , 5);
			
			$randData[$counting][0] = $this->newRandom();
			$randData[$counting][1] = $this->newRandom();
			$randData[$counting][2] = $this->newRandom();
			$randData[$counting][3] = $this->newRandom();
			
			$dataSum[$counting] = $randData[$counting][0] + $randData[$counting][1] + $randData[$counting][2] + $randData[$counting][3] ;
			$randData[$counting][0] = round(($randData[$counting][0] / $dataSum[$counting]) , 5);
			$randData[$counting][1] = round(($randData[$counting][1] / $dataSum[$counting]) , 5);
			$randData[$counting][2] = round(($randData[$counting][2] / $dataSum[$counting]) , 5);
			$randData[$counting][3] = round(($randData[$counting][3] / $dataSum[$counting]) , 5);
			
			$counting++;
		}
		
		$iterasi = 1;
		while($flagLooping == false)
		{
		
			for($x = 0; $x < count($dataNorm); $x++)
			{
				for($clus = 0; $clus < count($randData[$x]); $clus++)
				{
					$dataMiu[$x][0] = round(pow($randData[$x][$clus] , 2), 5);
					$dataMiu2[$x][$clus] = $dataMiu[$x][0];
					
					if(empty($miuTotal[$clus][0])) { $miuTotal[$clus][0] = 0; }
					$miuTotal[$clus][0] += $dataMiu[$x][0];
					
					for($y = 0; $y < count($dataNorm[$x]); $y++)
					{
						$dataMiu[$x][$y + 1] = round($dataMiu[$x][0] * $dataNorm[$x][$y], 5);
						
						if(empty($miuTotal[$clus][$y + 1])) { $miuTotal[$clus][$y + 1] = 0; }
						$miuTotal[$clus][$y + 1] += $dataMiu[$x][$y + 1];
					
					}
				}
				
			}
			
			
			//echo count($miuTotal) . " >> " . count($miuTotal[0]) . "<br>";
			for($a = 0; $a < count($miuTotal); $a++)
			{
				for($b=1; $b < count($miuTotal[$a]); $b++)
				{
					$pusatCluster[$a][$b - 1] = round($miuTotal[$a][$b] / $miuTotal[$a][0], 5);
				}
			}
			
			/* calculasi fungsi objective */
			$dataL = array(); $resultObjective = null;
			$dataL_1 = array(); $totalL = array();
			for($x = 0; $x < count($dataMiu2); $x++)
			{
				for($y = 0; $y < count($dataNorm[$x]); $y++)
				{
					for($z = 0; $z < count($pusatCluster)-1; $z++)
					{
						if(empty($dataL[$x][$y])) {$dataL[$x][$y] = 0;}
						$dataL[$x][$y] += pow($dataNorm[$x][$z] - $pusatCluster[$y][$z], 2);	
					}
					$dataL[$x][$y] = $dataL[$x][$y] * $dataMiu2[$x][$y];
					$dataL_1[$x][$y] = pow($dataL[$x][$y] / $dataMiu2[$x][$y] , -1);
					
					if(empty($totalL[$x])) { $totalL[$x] = 0; }
					$totalL[$x] += $dataL_1[$x][$y];
					
					$resultObjective += $dataL[$x][$y];
					
				}
				
			}
			if($resultObjective <= $epsilon)
			{
				$flagLooping = true;
			}
			
			/* new Random */
			for($x = 0; $x < count($dataL_1); $x++)
			{
				for($y = 0; $y < count($dataL_1[$x]); $y++)
				{
					$randData[$x][$y] = $dataL_1[$x][$y] / $totalL[$x];
				}				
			}
			
			if($iterasi == $maxIterasi)
			{
				$flagLooping = true;
			}
			
			$iterasi++;
		
		}
		
		
		/* rank pusat cluster */
		$totalRangking = array(); $ranking = array();
			
		for($x = 0; $x < count($pusatCluster); $x++)
		{
			for($y = 0; $y < count($pusatCluster[$x]); $y++)
			{
				if(empty($totalRangking[$x]) ) { $totalRangking[$x] = 0; }
				$totalRangking[$x] += $pusatCluster[$x][$y];
			}
		}
		
		$rangking = $totalRangking;
		$indexRanking = array();
		rsort($rangking);
		for($index = 0; $index < count($totalRangking) ; $index++)
		{
			$indexRanking[$index] = array_search($totalRangking[$index], $rangking) + 1;
		}
		
		/* pengambilan keputusan */
		$setNamaCluster = array("Tinggi", "Normal", "Pendek", "Sangat Pendek");
		$dataAnakResult = array();
		$maxRand = array(); $resultCluster = array();
		for($x = 0; $x < count($randData); $x++)
		{
			$maxRand[$x] = 0;
			for($y = 0; $y < count($randData[$x]); $y++)
			{
				
				if($randData[$x][$y] > $maxRand[$x])
				{
					$maxRand[$x] = $randData[$x][$y];
				}
				if($y == (count($randData[$x]) - 1))
				{
					$resultCluster[$x] = array_search($maxRand[$x], $randData[$x]);
					$dataAnakResult[$x] = $setNamaCluster[$resultCluster[$x]];
				}
				
			}
		}
		return $dataAnakResult;
		
	}
	
	public function dataAnak($afterAdd = false)
	{
		if($this->session->userdata('user') != '')
		{
			$this->data['hasil'] = $this->stuntingNoTbl();
			$this->data['posts'] = $this->m_account->getDataAnak();
			$this->data['tableTittle'] = "Tabel Anak";
			$this->data['afterAdd'] = $afterAdd;
			$data['content'] = $this->load->view('v_dataAnak', $this->data, true);
			
			$this->load->view('Template/Main', $data);
		}
		else
		{
			redirect("Stunting");
		}
	}
	
}
