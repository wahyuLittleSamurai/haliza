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
	public function index()
	{
		$this->load->view('v_login');
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
		$this->load->view('Template/Main', $urlMain);	
	}
	
	public function tenagaKesehatan()
	{
		$this->data['posts'] = $this->m_account->getTenagaKesehatan();
		$this->data['tableTittle'] = "Tabel Tenaga Kerja";
		$data['content'] = $this->load->view('v_dataTenagaKesehatan', $this->data, true);
		
		$this->load->view('Template/Main', $data);
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
	
	public function dataAnak()
	{
		$this->data['posts'] = $this->m_account->getDataAnak();
		$this->data['tableTittle'] = "Tabel Anak";
		$data['content'] = $this->load->view('v_dataAnak', $this->data, true);
		
		$this->load->view('Template/Main', $data);
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
			$this->dataAnak();
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
		$this->dataAnak();
	}
	public function calcStunting()
	{
		$jmlCluster = 3;
		$randomCluster = array();
		$pembobotan = 2;
		
		/* get database anak */
		$query = "SELECT * FROM tblanak";
		$result = $this->db->query($query)->result();
		
		/* random cluster awal */
		for($jml = 0; $jml < count($result); $jml++)
		{
			$randomCluster[$jml] = $this->randomData($jmlCluster);
		}
		echo "table random <br>";
		echo "<table style='border:1px solid black;'>";
		foreach ($randomCluster as $row) {
		   echo "<tr>";
		   foreach ($row as $column) {
			  echo "<td>".$column."</td>";
		   }
		   echo "</tr>";
		}    
		echo "</table>";
		
		/* miu kuadrat */
		$miuKuadrat = array();
		$sumMiuKuadrat = array(0,0,0); //sesuai banyaknya cluster
		for($x = 0; $x < count($randomCluster); $x++) 
		{
			for($y = 0; $y < count($randomCluster[$x]); $y++)
			{
				$miuKuadrat[$x][$y] = pow($randomCluster[$x][$y], $pembobotan);
				$sumMiuKuadrat[$y] += $miuKuadrat[$x][$y];
			}
		}
		echo "table miukuadrat <br>";
		echo "<table style='border:1px solid black;'>";
		foreach ($miuKuadrat as $row) {
		   echo "<tr>";
		   foreach ($row as $column) {
			  echo "<td>".$column."</td>";
		   }
		   echo "</tr>";
		}    
		echo "</table>";
		
		echo "table sum miukuadrat <br>";
		echo "<table style='border:1px solid black;'><tr>";
		foreach ($sumMiuKuadrat as $row) {
		     echo "<td>".$row."</td>";
		   
		}    
		echo "</tr></table>";
		
		
		/* miu kuadrat x(inputan) */
		$count = 0;
		$miuKuadratUser = array();
		$sumMiuKuadratUser = array(array());
		foreach($result as $res)
		{
			for($x = 0; $x < count($miuKuadrat[$count]); $x++)
			{
				// count = user ke x, 0 = inputan ke x, x = cluster ke x
				$miuKuadratUser[$count][0][$x] = (float)$res->umur * $miuKuadrat[$count][$x];
				$miuKuadratUser[$count][1][$x] = (float)$res->tb * $miuKuadrat[$count][$x];
				$miuKuadratUser[$count][2][$x] = (float)$res->bb * $miuKuadrat[$count][$x];
				
			}
			$count++;
		}
		echo "table miu kuadrat dengan input <br>";
		echo "<table style='border:1px solid black;'>";
		foreach ($miuKuadratUser as $row) {
		   echo "<tr>";
		   foreach ($row as $column) {
			  echo "<td>".$column[0]."</td>";
			  echo "<td>".$column[1]."</td>";
			  echo "<td>".$column[2]."</td>";
			  
		   }
		   echo "</tr>";
		}    
		echo "</table>";
	
		print_r($sumMiuKuadratUser);
		
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
		
		
$randData = array(
array("0.508685702","0.130153266","0.999167462","0.558648655","2.196655085"),
array("0.926765131","0.556507672","0.784142826","0.279297982","2.546713612"),
array("0.158462169","0.632922015","0.464803963","0.242849691","1.499037837"),
array("0.904225079","0.819980986","0.397657496","0.040482236","2.162345797"),
array("0.180076557","0.238190084","0.897804225","0.776065752","2.092136618"),
array("0.739508052","0.83070094","0.925763406","0.182337673","2.67831007"),
array("0.556332379","0.575638228","0.57792544","0.510342904","2.220238951"),
array("0.05312943","0.203640119","0.145332464","0.404991894","0.807093907"),
array("0.515888681","0.615167577","0.074798237","0.62672659","1.832581085"),
array("0.481302786","0.578913955","0.40099458","0.29639083","1.757602152"),
array("0.062988352","0.870093256","0.418413916","0.863243745","2.214739268"),
array("0.141597747","0.644202499","0.251298105","0.06447285","1.101571201"),
array("0.092510518","0.549963631","0.388017066","0.652166532","1.682657747"),
array("0.139485624","0.814028314","0.435831667","0.975093261","2.364438865"),
array("0.995173025","0.543025453","0.514482982","0.862699922","2.915381381"),
array("0.321435519","0.097345172","0.012295771","0.270530752","0.701607214"),
array("0.523761247","0.343415122","0.225271869","0.961795639","2.054243876"),
array("0.921638719","0.702579163","0.546083678","0.055274451","2.225576011"),
array("0.358772614","0.584022087","0.2760549","0.656911146","1.875760747"),
array("0.89749916","0.484168831","0.23735193","0.386186959","2.005206881"),
array("0.426983237","0.667612558","0.255096992","0.973620911","2.323313697"),
array("0.815575751","0.063576649","0.349640895","0.725471118","1.954264414"),
array("0.325203746","0.821545317","0.050168272","0.004809564","1.201726899"),
array("0.105310213","0.257835592","0.742246364","0.112596695","1.217988864"),
array("0.307574301","0.613284673","0.196479746","0.684814789","1.802153508"),
array("0.826263155","0.504809162","0.170895906","0.255137619","1.757105842"),
array("0.38806731","0.184816674","0.412068846","0.39015381","1.375106641"),
array("0.073857196","0.445500082","0.728986247","0.584106271","1.832449796"),
array("0.677163374","0.931927935","0.588974306","0.190917001","2.388982616"),
array("0.599553942","0.074252269","0.248569176","0.214361108","1.136736495"),
array("0.449573779","0.458230612","0.228230164","0.816525802","1.952560357"),
array("0.703903229","0.468991787","0.932497448","0.849265859","2.954658323"),
array("0.048278416","0.877823793","0.605815735","0.376851207","1.908769151"),
array("0.926176108","0.657939423","0.879851348","0.115821424","2.579788304"),
array("0.532641203","0.685477633","0.011176884","0.158489701","1.387785421"),
array("0.268131079","0.445782708","0.405668446","0.838223244","1.957805478"),
array("0.934412595","0.317090772","0.309006563","0.533392978","2.093902907"),
array("0.152058228","0.387753206","0.557125732","0.748493667","1.845430833"),
array("0.866760775","0.711761719","0.713509092","0.901302236","3.193333822"),
array("0.113431497","0.112076013","0.699931982","0.29950068","1.224940172"),
array("0.043350239","0.115741775","0.951186822","0.947952558","2.058231394"),
array("0.63795113","0.463693788","0.139994291","0.879560907","2.121200116"),
array("0.431139561","0.576902127","0.525132764","0.003447763","1.536622214"),
array("0.081571948","0.227597263","0.123580968","0.73537734","1.16812752"),
array("0.213606345","0.239234985","0.682158884","0.736058425","1.871058639"),
array("0.345781064","0.006414862","0.024517952","0.469509584","0.846223461"),
array("0.238958026","0.048541186","0.482881973","0.906552323","1.676933508"),
array("0.197210579","0.887723997","0.258689988","0.907772999","2.251397562"),
array("0.975690497","0.027256429","0.277994895","0.187323666","1.468265487"),
array("0.798372356","0.562241327","0.839742469","0.154806833","2.355162985"),
array("0.083076704","0.946917217","0.458737387","0.735700078","2.224431385"),
array("0.777162194","0.092417368","0.883736431","0.766398399","2.519714392"),
array("0.498891199","0.78221903","0.55199867","0.305949399","2.139058298"),
array("0.934874703","0.425734732","0.867430134","0.68419166","2.912231228")
);



		$query = "SELECT MIN(umur) umur, MIN(gender) gender, MIN(bb) bb, MIN(tb) tb FROM tblAnak";
		$resultData = $this->db->query($query)->result();
		$dataMax = null; $dataMin = null;
		$var1 = 0.8; $var2 = 0.1;
		$dataNorm = array();  $dataMiu = array();
		$miuTotal = array(); $pusatCluster = array();
		
		foreach($resultData as $data)
		{
			$dataMin = min($data->umur, $data->gender, $data->bb, $data->tb);
			$dataMax = max($data->umur, $data->gender, $data->bb, $data->tb);
		}
		echo "Data Min: ". $dataMin; echo "<br>";
		echo "Data Max: ". $dataMax=106; echo "<br>";
		
		$dataAnak = $this->m_account->getDataAnak();
		echo "table data anak <br>";
		echo "<table style='border:1px solid black;'>";
		echo "<tr><td>umur</td><td>gender</td><td>bb</td><td>tb</td>";
		echo "<td>=></td><td>norm umur</td><td>norm gender</td><td>norm bb</td><td>norm tb</td>";
		echo "<td>=></td><td>rand umur</td><td>rand gender</td><td>rand bb</td><td>rand tb</td></tr>";
		$counting = 0;
		foreach($dataAnak as $anak)
		{
			echo "<tr style='border:1px solid black;'>";
			echo "<td  style='border:1px solid black;'>".$anak->umur."</td>";
			echo "<td  style='border:1px solid black;'>".$anak->gender."</td>";
			echo "<td  style='border:1px solid black;'>".$anak->bb."</td>";
			echo "<td  style='border:1px solid black;'>".$anak->tb."</td>";
			
			$dataNorm[$counting][0] = round(($var1 * ($anak->umur - $dataMin) / ($dataMax - $dataMin) + $var2) , 5);
			$dataNorm[$counting][1] = round(($var1 * ($anak->gender - $dataMin) / ($dataMax - $dataMin) + $var2) , 5);
			$dataNorm[$counting][2] = round(($var1 * ($anak->bb - $dataMin) / ($dataMax - $dataMin) + $var2) , 5);
			$dataNorm[$counting][3] = round(($var1 * ($anak->tb - $dataMin) / ($dataMax - $dataMin) + $var2) , 5);
			echo "<td  style='border:1px solid black;'> => </td>";
			echo "<td  style='border:1px solid black;'>".$dataNorm[$counting][0]."</td>";
			echo "<td  style='border:1px solid black;'>".$dataNorm[$counting][1]."</td>";
			echo "<td  style='border:1px solid black;'>".$dataNorm[$counting][2]."</td>";
			echo "<td  style='border:1px solid black;'>".$dataNorm[$counting][3]."</td>";
			/*
			$randData[$counting][0] = $this->newRandom();
			$randData[$counting][1] = $this->newRandom();
			$randData[$counting][2] = $this->newRandom();
			$randData[$counting][3] = $this->newRandom();
			*/
			$dataSum[$counting] = $randData[$counting][0] + $randData[$counting][1] + $randData[$counting][2] + $randData[$counting][3] ;
			$randData[$counting][0] = round(($randData[$counting][0] / $dataSum[$counting]) , 5);
			$randData[$counting][1] = round(($randData[$counting][1] / $dataSum[$counting]) , 5);
			$randData[$counting][2] = round(($randData[$counting][2] / $dataSum[$counting]) , 5);
			$randData[$counting][3] = round(($randData[$counting][3] / $dataSum[$counting]) , 5);
			
			echo "<td  style='border:1px solid black;'> => </td>";
			echo "<td  style='border:1px solid black;'>".$randData[$counting][0]."</td>";
			echo "<td  style='border:1px solid black;'>".$randData[$counting][1]."</td>";
			echo "<td  style='border:1px solid black;'>".$randData[$counting][2]."</td>";
			echo "<td  style='border:1px solid black;'>".$randData[$counting][3]."</td>";
			
			echo "<tr>";
			
			$counting++;
		}
		echo "</table>";
		
		echo "<br><br> Iterasi 1 <br>";
		echo "<table style='border:1px solid black;'>";
		
		echo "<tr><td>Miu</td><td>Miu 1</td><td>Miu 2</td><td>Miu 3</td><td>Miu 4</td>";
		echo "<td>Miu</td><td>Miu 1</td><td>Miu 2</td><td>Miu 3</td><td>Miu 4</td>";
		echo "<td>Miu</td><td>Miu 1</td><td>Miu 2</td><td>Miu 3</td><td>Miu 4</td>";
		echo "<td>Miu</td><td>Miu 1</td><td>Miu 2</td><td>Miu 3</td><td>Miu 4</td></tr>";
		echo "<tr><td>Cluster 1</td><td></td><td></td><td></td><td></td>";
		echo "<td>Cluster 2</td><td></td><td></td><td></td><td></td>";
		echo "<td>Cluster 3</td><td></td><td></td><td></td><td></td>";
		echo "<td>Cluster 4</td><td></td><td></td><td></td><td></td></tr>";
			
		for($x = 0; $x < count($dataNorm); $x++)
		{
			echo "<tr>";
			for($clus = 0; $clus < count($randData[$x]); $clus++)
			{
				$dataMiu[$x][0] = pow($randData[$x][$clus] , 2);
				echo "<td  style='border:1px solid black;'>".$dataMiu[$x][0]."</td>";		
				
				if(empty($miuTotal[$clus][0])) { $miuTotal[$clus][0] = 0; }
				$miuTotal[$clus][0] += $dataMiu[$x][0];
				
				for($y = 0; $y < count($dataNorm[$x]); $y++)
				{
					$dataMiu[$x][$y + 1] = $dataMiu[$x][0] * $dataNorm[$x][$y];
					echo "<td  style='border:1px solid black;'>".$dataMiu[$x][$y + 1]."</td>";
					
					if(empty($miuTotal[$clus][$y + 1])) { $miuTotal[$clus][$y + 1] = 0; }
					$miuTotal[$clus][$y + 1] += $dataMiu[$x][$y + 1];
				
				}
			}
			/* tampil total miu */
			if($x == (count($dataNorm) -1))
			{
				echo "<tr><td>Total Miu</td></tr>";
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
		
		echo "</table>";
		
		
		/* calculasi pusat cluster */
		
		echo "<table><tr><td>Pusat Cluster</td></tr>";
		//echo count($miuTotal) . " >> " . count($miuTotal[0]) . "<br>";
		for($a = 0; $a < count($miuTotal); $a++)
		{
			echo "<tr>";
			for($b=1; $b < count($miuTotal[$a]); $b++)
			{
				$pusatCluster[$a][$b - 1] = $miuTotal[$a][$b] / $miuTotal[$a][0];
				echo "<td style='border:1px solid black;'>".$pusatCluster[$a][$b - 1]."</td>";
			}
			echo "</tr>";
		}
		echo "</tr></table>";
		
		/* calculasi fungsi objective */
		echo "<table><tr><td>Fungsi Objective</td></tr>";
		//echo count($miuTotal) . " >> " . count($miuTotal[0]) . "<br>";
		for($x = 0; $x < count($dataMiu); $x++)
		{
			echo "<tr>";
			for($y = 0; $y < count($dataMiu[$x]); $y++)
			{
				echo "<td>" . $dataMiu[$x][$y] . "</td>";
			}
			echo "</tr>";
		}
		echo "</tr></table>";
		
	}
}
