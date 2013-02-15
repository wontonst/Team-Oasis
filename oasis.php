<?php
$name='';///<string variable for name
$intake = -1;///<softdrink weekly intake

class Diagnosis
{
  private $data;
  public function __construct($msg,$up,$bot)
  {
    $this->data['msg']=$msg;
    $this->data['upper']=$up;
    $this->data['lower']=$bot;
  }
  public function __get($v)
  {
    return $this->data[$v];
  }
  public function diagnose($n)
  {
    if($n <= $this->data['upper'] && $n >= $this->data['lower'])
      return true;
  }
}
$diagnosis=array();
$diagnosis[]=new Diagnosis("[no msg implemented for drinks > 31]",99999,22);
$diagnosis[]=new Diagnosis("Stop taking soft drinks or you will have yourself to blame once you are diagnosed with diabetes",30,21);
$diagnosis[]=new Diagnosis("You have to reduce it to less than 5 in a week or you will be diabetic in not less than 5 years",20,11);
$diagnosis[]=new Diagnosis("Please Reduce your intake of soft drinks or in 15 yrs you will be diabetic",10,3);
$diagnosis[]=new Diagnosis("You are safe from diabetes",2,0);


$f = fopen('php://stdin','r');

echo "This is a console program that predicts when a user will be diabetic.\n";
echo "Please enter your full name:";
$name = trim(fgets($f));
echo "Welcome ".$name.", this is a basic program that predicts when u are liable to be diabetic.\n";
echo "Please enter the number of times you take soft drinks in a week: ";
    while(true)
      {
	$intake = fgets($f);
	if(is_numeric($intake) || $intake >= 0)
	  break;
	echo 'Invalid input. Please try again.'."\n";
      }

foreach($diagnosis as &$v)
{
  if($v->diagnose($intake))
    {
echo      $v->msg."\n";
      break;
    }
}
echo "Thanks, ". $name . ", for taking my Anti-Soft drink advisement program.\n";


?>