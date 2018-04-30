<?php
/**
 * Created by PhpStorm.
 * User: han
 * Date: 2017/5/17
 * Time: 12:31
 * 党课类
 * Class dangke
 */
class dangke
{
    private $id; //账号
    private $pwd; //密码
    private $wanted_score; //期望分数
    private $user_score_id; //试卷分数id,暂时未作模拟登陆时需要用到
    private $true_answer = []; //正确结果
    //初始数据字符串
    private $data_orign = "PaperID=28&PassMark=60&FillAutoGrade=1&SeeResult=1&AutoJudge=1&timeminute=59&timesecond=47&TestTypeTitle1=%B5%A5%D1%A1%CC%E2&RubricID1=9&BaseTestType1=%B5%A5%D1%A1%C0%E0&TestTypeTitle2=%B5%A5%D1%A1%CC%E2&RubricID2=12&BaseTestType2=%B5%A5%D1%A1%C0%E0&TestTypeTitle3=%B5%A5%D1%A1%CC%E2&RubricID3=28&BaseTestType3=%B5%A5%D1%A1%C0%E0&TestTypeTitle4=%B5%A5%D1%A1%CC%E2&RubricID4=29&BaseTestType4=%B5%A5%D1%A1%C0%E0&TestTypeTitle5=%B5%A5%D1%A1%CC%E2&RubricID5=30&BaseTestType5=%B5%A5%D1%A1%C0%E0&TestTypeTitle6=%B5%A5%D1%A1%CC%E2&RubricID6=42&BaseTestType6=%B5%A5%D1%A1%C0%E0&TestTypeTitle7=%B5%A5%D1%A1%CC%E2&RubricID7=44&BaseTestType7=%B5%A5%D1%A1%C0%E0&TestTypeTitle8=%B5%A5%D1%A1%CC%E2&RubricID8=54&BaseTestType8=%B5%A5%D1%A1%C0%E0&TestTypeTitle9=%B5%A5%D1%A1%CC%E2&RubricID9=56&BaseTestType9=%B5%A5%D1%A1%C0%E0&TestTypeTitle10=%B5%A5%D1%A1%CC%E2&RubricID10=62&BaseTestType10=%B5%A5%D1%A1%C0%E0&TestTypeTitle11=%B5%A5%D1%A1%CC%E2&RubricID11=69&BaseTestType11=%B5%A5%D1%A1%C0%E0&TestTypeTitle12=%B5%A5%D1%A1%CC%E2&RubricID12=71&BaseTestType12=%B5%A5%D1%A1%C0%E0&TestTypeTitle13=%B5%A5%D1%A1%CC%E2&RubricID13=73&BaseTestType13=%B5%A5%D1%A1%C0%E0&TestTypeTitle14=%B5%A5%D1%A1%CC%E2&RubricID14=82&BaseTestType14=%B5%A5%D1%A1%C0%E0&TestTypeTitle15=%B5%A5%D1%A1%CC%E2&RubricID15=84&BaseTestType15=%B5%A5%D1%A1%C0%E0&TestTypeTitle16=%B5%A5%D1%A1%CC%E2&RubricID16=87&BaseTestType16=%B5%A5%D1%A1%C0%E0&TestTypeTitle17=%B5%A5%D1%A1%CC%E2&RubricID17=98&BaseTestType17=%B5%A5%D1%A1%C0%E0&TestTypeTitle18=%B5%A5%D1%A1%CC%E2&RubricID18=105&BaseTestType18=%B5%A5%D1%A1%C0%E0&TestTypeTitle19=%B5%A5%D1%A1%CC%E2&RubricID19=108&BaseTestType19=%B5%A5%D1%A1%C0%E0&TestTypeTitle20=%B5%A5%D1%A1%CC%E2&RubricID20=130&BaseTestType20=%B5%A5%D1%A1%C0%E0&TestTypeTitle21=%B6%E0%D1%A1%CC%E2&RubricID21=151&BaseTestType21=%B6%E0%D1%A1%C0%E0&TestTypeTitle22=%B6%E0%D1%A1%CC%E2&RubricID22=154&BaseTestType22=%B6%E0%D1%A1%C0%E0&TestTypeTitle23=%B6%E0%D1%A1%CC%E2&RubricID23=168&BaseTestType23=%B6%E0%D1%A1%C0%E0&TestTypeTitle24=%B6%E0%D1%A1%CC%E2&RubricID24=169&BaseTestType24=%B6%E0%D1%A1%C0%E0&TestTypeTitle25=%B6%E0%D1%A1%CC%E2&RubricID25=204&BaseTestType25=%B6%E0%D1%A1%C0%E0&TestTypeTitle26=%B6%E0%D1%A1%CC%E2&RubricID26=207&BaseTestType26=%B6%E0%D1%A1%C0%E0&TestTypeTitle27=%B6%E0%D1%A1%CC%E2&RubricID27=211&BaseTestType27=%B6%E0%D1%A1%C0%E0&TestTypeTitle28=%B6%E0%D1%A1%CC%E2&RubricID28=219&BaseTestType28=%B6%E0%D1%A1%C0%E0&TestTypeTitle29=%B6%E0%D1%A1%CC%E2&RubricID29=223&BaseTestType29=%B6%E0%D1%A1%C0%E0&TestTypeTitle30=%B6%E0%D1%A1%CC%E2&RubricID30=228&BaseTestType30=%B6%E0%D1%A1%C0%E0&TestTypeTitle31=%B6%E0%D1%A1%CC%E2&RubricID31=254&BaseTestType31=%B6%E0%D1%A1%C0%E0&TestTypeTitle32=%B6%E0%D1%A1%CC%E2&RubricID32=256&BaseTestType32=%B6%E0%D1%A1%C0%E0&TestTypeTitle33=%B6%E0%D1%A1%CC%E2&RubricID33=261&BaseTestType33=%B6%E0%D1%A1%C0%E0&TestTypeTitle34=%B6%E0%D1%A1%CC%E2&RubricID34=271&BaseTestType34=%B6%E0%D1%A1%C0%E0&TestTypeTitle35=%B6%E0%D1%A1%CC%E2&RubricID35=276&BaseTestType35=%B6%E0%D1%A1%C0%E0&TestTypeTitle36=%B6%E0%D1%A1%CC%E2&RubricID36=282&BaseTestType36=%B6%E0%D1%A1%C0%E0&TestTypeTitle37=%B6%E0%D1%A1%CC%E2&RubricID37=287&BaseTestType37=%B6%E0%D1%A1%C0%E0&TestTypeTitle38=%B6%E0%D1%A1%CC%E2&RubricID38=294&BaseTestType38=%B6%E0%D1%A1%C0%E0&TestTypeTitle39=%B6%E0%D1%A1%CC%E2&RubricID39=305&BaseTestType39=%B6%E0%D1%A1%C0%E0&TestTypeTitle40=%B6%E0%D1%A1%CC%E2&RubricID40=306&BaseTestType40=%B6%E0%D1%A1%C0%E0&irow=40&UserScoreID=";
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
                ["C","D"]
            ];

    /**
     * dangke constructor.
     * @param string $id
     * @param string $pwd
     * @param int $wanted_score
     */
    public function __construct($id = '', $pwd = '', $wanted_score = 100)
    {
        //初始化
        $this->id = $id;
        $this->pwd = $pwd;
        $this->wanted_score = $wanted_score;
        $this->data_orign = $this->data_orign.$this->user_score_id;
    }
  
    //登录并获取scoreid
    public function login(){
      $score_id = $this->_get_score_id();
      if($score_id==-1) return "账号或者密码错误，登录失败";
      $this->user_score_id=$score_id;//设置score_id
    }

    /**正确答案
     * @return array
     */
    public function get_answers()
    {
        if(empty($this->true_answer))
            $this->_get_answers();
        return $this->true_answer;
    }

    /**返回最终分数
     * @return mixed
     */
    public function run()
    {

        $data = $this->data_orign;
        foreach ($this->true_array as $key => $value)
        {
            echo $key.'--';print_r($value);echo ' ';
            $data.=$this->_set_choice($key,$value);
        }
        $res = $this->_submit_exam($data);
        //解析分数
        $score = $this->_parse_score($res);
        return $score;
    }

    public function _get_score_id()
    {
        $data = "__EVENTTARGET=&__EVENTARGUMENT=&__VIEWSTATE=%2FwEPDwUKMTAwOTEyMzg0MA9kFgJmD2QWAgIEDw9kFgIeB29uY2xpY2sFDXJldHVybiBmYWxzZTtkZLkxb5MMuALdescd8eyX8uEVACRe&__EVENTVALIDATION=%2FwEWBQL8%2FYujBgKp8%2FQVAoTOnYUHAtT2pdkGAtj92vELWa02GudzKD66znxhBnY%2F%2FSHnl5M%3D&LoginID=".$this->id."&UserPwd=".$this->pwd."&ButLogin=%B5%C7+%C2%BC";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://202.197.61.23/exam/login.aspx?logintp=1",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => 1,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "Referer" => "http://202.197.61.23/exam/login.aspx?logintp=1",
                "User-Agent" => "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36",
                "Content-Type" => "application/x-www-form-urlencoded"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
            return FALSE;
        } else {
            $response = iconv("gb2312","UTF-8",$response);
        }
      preg_match("/set\-cookie:([^\r\n]*)/i", $response, $matches);  
      $cookie = $matches[1];
      if(strpos($response,"密码错误")!==false){
        return -1;//账号或者密码错误
      }
      //登陆成功,解析userid
      if(strpos($response,"location.href='MainFrame.aspx'")!==false){
        $curl=curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://202.197.61.23/exam/PersonInfo/JoinExam.aspx",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_COOKIE=>$cookie,
            CURLOPT_HTTPHEADER => array(
                "Referer" => "http://202.197.61.23/exam/MainLeftMenu.aspx",
                "User-Agent" => "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
            return FALSE;
        } else {
            $response = iconv("gb2312","UTF-8",$response);
        }
        preg_match("/UserID=(.*)&amp;Start=yes/",$response,$matches);
        if(isset($matches[1])) return $matches[1];
      }
      return -1;
    }
  

    /**
     *得到正确答案
     */
    private function _get_answers()
    {

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
                    $this->true_array[$i] = $this->arraychoice[$j];
                    break;
                }
            }

        }
    }

    /**提交信息
     * @param $data
     * @return bool|string
     */
    private function _submit_exam($data)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://202.197.61.23/exam/PersonInfo/SubmExamAll.aspx",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "User-Agent" => "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36",
                "Content-Type" => "application/x-www-form-urlencoded",
                "Accept"      =>  "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
            return FALSE;
        } else {
            return iconv("gb2312","UTF-8",$response);
        }

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


}