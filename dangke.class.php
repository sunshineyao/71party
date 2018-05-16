<?php
/**
 * Created by PhpStorm.
 * User: csuhan
 * https://lovesmg.cn
 * Date: 2017/5/17
 * Update 2018/5/16
 * Time: 12:31
 * 党课类
 * 距离上次居然已经过了一年了，嘿嘿
 * Class dangke
 */
class dangke
{
    private $id; //账号
    private $pwd; //密码
    private $wanted_score; //期望分数
    private $user_id; //用户内部id
    private $user_score_id; //试卷id
    private $exam_ids = [];//试卷题目id
    private $paper_id='28'; //试卷类型
    private $true_answer = []; //正确结果
    //初始数据字符串
    private $data_orign = "PassMark=60&FillAutoGrade=1&SeeResult=1&AutoJudge=1&timeminute=59&timesecond=47&TestTypeTitle1=%B5%A5%D1%A1%CC%E2&BaseTestType1=%B5%A5%D1%A1%C0%E0&TestTypeTitle2=%B5%A5%D1%A1%CC%E2&BaseTestType2=%B5%A5%D1%A1%C0%E0&TestTypeTitle3=%B5%A5%D1%A1%CC%E2&BaseTestType3=%B5%A5%D1%A1%C0%E0&TestTypeTitle4=%B5%A5%D1%A1%CC%E2&BaseTestType4=%B5%A5%D1%A1%C0%E0&TestTypeTitle5=%B5%A5%D1%A1%CC%E2&BaseTestType5=%B5%A5%D1%A1%C0%E0&TestTypeTitle6=%B5%A5%D1%A1%CC%E2&BaseTestType6=%B5%A5%D1%A1%C0%E0&TestTypeTitle7=%B5%A5%D1%A1%CC%E2&BaseTestType7=%B5%A5%D1%A1%C0%E0&TestTypeTitle8=%B5%A5%D1%A1%CC%E2&BaseTestType8=%B5%A5%D1%A1%C0%E0&TestTypeTitle9=%B5%A5%D1%A1%CC%E2&BaseTestType9=%B5%A5%D1%A1%C0%E0&TestTypeTitle10=%B5%A5%D1%A1%CC%E2&BaseTestType10=%B5%A5%D1%A1%C0%E0&TestTypeTitle11=%B5%A5%D1%A1%CC%E2&BaseTestType11=%B5%A5%D1%A1%C0%E0&TestTypeTitle12=%B5%A5%D1%A1%CC%E2&BaseTestType12=%B5%A5%D1%A1%C0%E0&TestTypeTitle13=%B5%A5%D1%A1%CC%E2&BaseTestType13=%B5%A5%D1%A1%C0%E0&TestTypeTitle14=%B5%A5%D1%A1%CC%E2&BaseTestType14=%B5%A5%D1%A1%C0%E0&TestTypeTitle15=%B5%A5%D1%A1%CC%E2&BaseTestType15=%B5%A5%D1%A1%C0%E0&TestTypeTitle16=%B5%A5%D1%A1%CC%E2&BaseTestType16=%B5%A5%D1%A1%C0%E0&TestTypeTitle17=%B5%A5%D1%A1%CC%E2&BaseTestType17=%B5%A5%D1%A1%C0%E0&TestTypeTitle18=%B5%A5%D1%A1%CC%E2&BaseTestType18=%B5%A5%D1%A1%C0%E0&TestTypeTitle19=%B5%A5%D1%A1%CC%E2&BaseTestType19=%B5%A5%D1%A1%C0%E0&TestTypeTitle20=%B5%A5%D1%A1%CC%E2&BaseTestType20=%B5%A5%D1%A1%C0%E0&TestTypeTitle21=%B6%E0%D1%A1%CC%E2&BaseTestType21=%B6%E0%D1%A1%C0%E0&TestTypeTitle22=%B6%E0%D1%A1%CC%E2&BaseTestType22=%B6%E0%D1%A1%C0%E0&TestTypeTitle23=%B6%E0%D1%A1%CC%E2&BaseTestType23=%B6%E0%D1%A1%C0%E0&TestTypeTitle24=%B6%E0%D1%A1%CC%E2&BaseTestType24=%B6%E0%D1%A1%C0%E0&TestTypeTitle25=%B6%E0%D1%A1%CC%E2&BaseTestType25=%B6%E0%D1%A1%C0%E0&TestTypeTitle26=%B6%E0%D1%A1%CC%E2&BaseTestType26=%B6%E0%D1%A1%C0%E0&TestTypeTitle27=%B6%E0%D1%A1%CC%E2&BaseTestType27=%B6%E0%D1%A1%C0%E0&TestTypeTitle28=%B6%E0%D1%A1%CC%E2&BaseTestType28=%B6%E0%D1%A1%C0%E0&TestTypeTitle29=%B6%E0%D1%A1%CC%E2&BaseTestType29=%B6%E0%D1%A1%C0%E0&TestTypeTitle30=%B6%E0%D1%A1%CC%E2&BaseTestType30=%B6%E0%D1%A1%C0%E0&TestTypeTitle31=%B6%E0%D1%A1%CC%E2&BaseTestType31=%B6%E0%D1%A1%C0%E0&TestTypeTitle32=%B6%E0%D1%A1%CC%E2&BaseTestType32=%B6%E0%D1%A1%C0%E0&TestTypeTitle33=%B6%E0%D1%A1%CC%E2&BaseTestType33=%B6%E0%D1%A1%C0%E0&TestTypeTitle34=%B6%E0%D1%A1%CC%E2&BaseTestType34=%B6%E0%D1%A1%C0%E0&TestTypeTitle35=%B6%E0%D1%A1%CC%E2&BaseTestType35=%B6%E0%D1%A1%C0%E0&TestTypeTitle36=%B6%E0%D1%A1%CC%E2&BaseTestType36=%B6%E0%D1%A1%C0%E0&TestTypeTitle37=%B6%E0%D1%A1%CC%E2&BaseTestType37=%B6%E0%D1%A1%C0%E0&TestTypeTitle38=%B6%E0%D1%A1%CC%E2&BaseTestType38=%B6%E0%D1%A1%C0%E0&TestTypeTitle39=%B6%E0%D1%A1%CC%E2&BaseTestType39=%B6%E0%D1%A1%C0%E0&TestTypeTitle40=%B6%E0%D1%A1%CC%E2&BaseTestType40=%B6%E0%D1%A1%C0%E0&irow=40&";
    //选项集合
   private $arraychoice = [
                "A","B","C","D",
                ["A","B"],
                ["A","C"],
                ["A","D"],
                ["A","B","C"],
                ["A","B","D"],
                ["A","C","D"],
                ["A","B","C","D"],
                ["B","C"],
                ["B","D"],
                ["B","C","D"],
                ["C","D"],
                ["A","B","C","D","E"],
            ];
    //cookie
    private $cookie = '';

    /**
     * dangke constructor.
     * @param string $id
     * @param string $pwd
     * @param int $wanted_score
     */
    public function __construct($id = '', $pwd = '',$score_id='', $wanted_score = 100)
    {
        //初始化
        $this->id = $id;
        $this->pwd = $pwd;
        $this->user_score_id=$score_id;
        $this->wanted_score = $wanted_score;
        if($this->user_score_id!='')
          $this->data_orign = $this->data_orign.'UserScoreID='.$this->user_score_id.'&PaperID='.$this->paper_id."&";
    }

    //运行
    public function run_with_time($seconds){
        if($this->login()){
            print_r("Login successful\n");
            $this->get_paper();
            print_r("Waiting for ".$seconds." seconds\n");
            sleep($seconds);
            print_r("Getting answer\n");
            $this->get_answers();
            $score = $this->run();
            print_r("ID:".$this->id."\tPWD:".$this->pwd."\tSCORE:".$score."\n");
        }else{
            exit("Login failed\n");
        }
    }
  
    //登录
    public function login(){
        //登陆参数
        $data = "__EVENTTARGET=&__EVENTARGUMENT=&__VIEWSTATE=%2FwEPDwUKMTAwOTEyMzg0MA9kFgJmD2QWAgIEDw9kFgIeB29uY2xpY2sFDXJldHVybiBmYWxzZTtkZLkxb5MMuALdescd8eyX8uEVACRe&__EVENTVALIDATION=%2FwEWBQL8%2FYujBgKp8%2FQVAoTOnYUHAtT2pdkGAtj92vELWa02GudzKD66znxhBnY%2F%2FSHnl5M%3D&LoginID=".$this->id."&UserPwd=".$this->pwd."&ButLogin=%B5%C7+%C2%BC";

        $response = $this->http_post("http://202.197.61.23/exam/login.aspx?logintp=1",$data,'',"http://202.197.61.23/exam/login.aspx?logintp=1");
        //解析cookie
        preg_match("/set\-cookie:([^\r\n]*)/i", $response, $matches);  
        $this->cookie = $matches[1];
        //print($this->cookie);
        if(strpos($response,"密码错误")!==false){
        return false;//账号或者密码错误
        }
        //登陆成功,解析userid
        if(strpos($response,"location.href='MainFrame.aspx'")==false) return false;

        return true;
    }

    //获取试卷
    public function get_paper()
    {
        //参加考试
        $response=$this->http_get("http://202.197.61.23/exam/PersonInfo/JoinExam.aspx",$this->cookie, "http://202.197.61.23/exam/MainLeftMenu.aspx");
        //解析试卷PaperID、UserID
        preg_match("/PaperID=(.*)&amp;UserID=(.*)&amp;Start=yes/",$response,$matches);
        //print_r($matches);
        if(isset($matches[2])){
          $this->paper_id=$matches[1];
          $this->user_id=$matches[2];
          //解析试卷id
          $url= "http://202.197.61.23/exam/PersonInfo/StartExamAll.aspx?PaperID=".$this->paper_id."&UserID=".$this->user_id."&Start=yes";
          $refer = "http://202.197.61.23/exam/PersonInfo/JoinExam.aspx";
          $response=$this->http_get($url,$this->cookie,$refer);
         // print($response);
          //解析user_score_id
          preg_match("/AutoJudge([\s\S]*)value=\"(.*)\" name=UserScoreID/",$response,$matches);
          //print_r($matches);
          if(isset($matches[2])){
            $this->user_score_id=$matches[2];
          }else{return false;}
          //设置请求字符串
          $this->data_orign = $this->data_orign.'UserScoreID='.$this->user_score_id.'&PaperID='.$this->paper_id."&";
          //解析RubricID
          preg_match_all("/name='RubricID(\d*)' value='(\d*)'>/", $response,$matches);
          // print_r($matches);
          if(isset($matches[2])){
            $this->exam_ids = $matches[2];      
          }
          //print_r($this->data_orign);
        }else{return false;}
      return true;
    }
  

    /**正确答案
     * @return array
     */
    public function get_answers()
    {
        if(!empty($this->true_answer))return $this->true_answer;
        for ($i=1; $i<=40; $i++)
        {
            $start = 0; //起始位置
            $end = 0; //终止位置
            if($i<=20)
            {
                $start = 0;
                $end = 4;
            }
            else
            {
                $start = 4;
                $end = 15;
            }
            //一个个试答案
            for($j = $start;$j<$end;$j++)
            {
                $res = $this->_submit_exam($this->data_orign.$this->_set_choice($i,$this->arraychoice[$j]));
                $score = $this->_parse_score($res);
                if($score>0)
                {
                    $this->true_answer[$i] = $this->arraychoice[$j];
                    break;
                }
            }

        }
        return $this->true_answer;
    }

    /**返回最终分数
     * @return mixed
     */
    public function run()
    {
        foreach ($this->exam_ids as $key => $value) {
            if($this->true_answer[$key+1]!=["A","B","C","D","E"]){
                $this->data_orign.="RubricID".($key+1)."=".$value."&";
            }
        }
        //判断所需分数
        switch ($this->wanted_score) {
            case '98':
                $this->true_answer[20]=[];
                break;
            case '97':
                $this->true_answer[40]=[];
                break;
            case '96':
                $this->true_answer[18]=[];
                $this->true_answer[19]=[];
                $this->true_answer[20]=[];
                break;
            case '95':
                $this->true_answer[20]=[];
                $this->true_answer[40]=[];
                break;
            default:
                # code...
                break;
        }
        //设置请求参数
        foreach ($this->true_answer as $key => $value)
        {
            $this->data_orign.=$this->_set_choice($key,$value);
        }
        $res = $this->_submit_exam($this->data_orign);
        //解析分数
        $score = $this->_parse_score($res);
        return $score;
    }

    /**提交信息
     * @param $data
     * @return bool|string
     */
    private function _submit_exam($data)
    {
        return $this->http_post("http://202.197.61.23/exam/PersonInfo/SubmExamAll.aspx",$data);
    }

    /**解析分数
     * @param $res
     * @return mixed
     */
    public function _parse_score($res)
    {
        preg_match("/<B>您自动评卷得分：(.*)<\/B>/",$res,$score);
        if(isset($score[1]))
        {
            $score = $score[1];
            return $score;
        }
        else
            exit("出错了");
    }

    /**设置选项
     * @param $id
     * @param $answer
     * @return string 结果字符串
     */
    function _set_choice($id, $answer)
    {
        if(!is_array($answer))
            return "&Answer".$id."=".$answer;
        else
        {
            $res = "";
            foreach ($answer as $value)
            {
                $res .= "&Answer".$id."=".$value;
            }
            return $res;
        }
    }
  
  //get请求
  function http_get($url,$cookie='',$refer=''){
    $curl=curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_HTTPHEADER => array(
            "Referer" => $refer,
            "User-Agent" => "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36",
        ),
    ));
    if($cookie!=='')curl_setopt($curl, CURLOPT_COOKIE, $cookie);
    if($refer!=='')curl_setopt($curl, CURLOPT_HTTPHEADER,array(
            "Referer" => $refer,
            "User-Agent" => "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36",
        ));
    else{
        curl_setopt($curl, CURLOPT_HTTPHEADER,array(
            "User-Agent" => "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36",
        ));
    }
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
        echo "cURL Error #:" . $err;
        return false;
    } else {
       return iconv("gb2312","UTF-8",$response);
    }
  }
  //post请求
  function http_post($url,$data,$cookie='',$refer=''){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HEADER => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $data,
    ));
    if($cookie!=='')curl_setopt($curl, CURLOPT_COOKIE, $cookie);
    if($refer!=='')curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Referer"=>$refer,
            "User-Agent" => "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36",
            "Content-Type" => "application/x-www-form-urlencoded",
            "Accept"      =>  "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
        ));
    else{
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "User-Agent" => "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36",
            "Content-Type" => "application/x-www-form-urlencoded",
            "Accept"      =>  "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
        ));
    }

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
        echo "cURL Error #:" . $err;
        return false;
    } else {
        return iconv("gb2312","UTF-8",$response);
    }
  }


}