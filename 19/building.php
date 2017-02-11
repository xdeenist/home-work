 <?php
/**
* 
*/
class Home
{
	public $number;
	public $tipDoma;
	public $kvarvirNaEtag;
	public $kvartir_v_pod;

	public function KakoyDom(){
			if (condition) {
				# code...
			}
	}

	public function HomeEtaj(){
			echo "Тип дома : " . $this->tipDoma  . "\n";
			$skolko_pogjezd = ceil($this->number / $this->kvartir_v_pod);
			echo "Подъезд: " . $skolko_pogjezd . "\n";
			$a =  $this->number - ($this->kvartir_v_pod * ($skolko_pogjezd - 1));
			echo "Этаж: " . ceil($a / $this->kvarvirNaEtag) . "\n";
	}		
}

$KHR_5_4 = new Home;
$KHR_5_4->tipDoma = "KHR_5_4";
$KHR_5_4->number = 172;
$KHR_5_4->kvartir_v_pod = 15;
$KHR_5_4->kvarvirNaEtag = 3;
$KHR_5_4->HomeEtaj();

$SLT_9_7 = new Home;
$SLT_9_7->tipDoma = "SLT_9_7";
$SLT_9_7->number = 36;
$SLT_9_7->kvartir_v_pod = 36;
$SLT_9_7->kvarvirNaEtag = 4;
$SLT_9_7->HomeEtaj();
