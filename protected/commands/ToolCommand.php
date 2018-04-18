<?php

/**
 * 工具类脚本
 */
class ToolCommand extends CConsoleCommand
{
    /**
     * 同步本地静态文件到七牛
     */
    public function actionQnSync()
    {
        $basePath = Yii::app()->basePath;
        $baseDir = Yii::app()->name;
        $date = date('YmdHis');
        $QnUrl = Yii::app()->staticFile->host.'/';
        $fileArr = [
            'pro.js' => '/resoldwap/build/pro.js'
        ];
        echo "Start Sync:\n";
        echo "Version:{$date}\n";
        echo "==========================\n";
        foreach ($fileArr as $name => $path) {
            $path = $basePath.'/../'.$path;
            $extPath = $baseDir.'/'.$date.'/'.$name;
            $r = Yii::app()->staticFile->consoleFileUpload($path, $extPath);

            if (isset($r['key'])) {
                echo $QnUrl.$r['key']."\n";
            } else {
                var_dump($r);
            }
        }
    }

    public function actionAddData()
    {
        $arr = [['level'=>'初级','jtz'=>'赵','correct'=>'趙','arr'=>['趙','拉','啦','腊','喀','摺']],
['level'=>'初级','jtz'=>'钱','correct'=>'錢','arr'=>['錢','票','片','删','签','遣']],
['level'=>'初级','jtz'=>'孙','correct'=>'孫','arr'=>['孫','考','看','烂','刊','揽']],
['level'=>'初级','jtz'=>'郑','correct'=>'鄭','arr'=>['鄭','交','叫','邓','脸','聊']],
['level'=>'初级','jtz'=>'杨','correct'=>'楊','arr'=>['楊','王','汪','阳','央','炀']],
['level'=>'初级','jtz'=>'亿','correct'=>'億','arr'=>['億','已','欧','为','維','不']],
['level'=>'初级','jtz'=>'载','correct'=>'載','arr'=>['載','希','睎','泼','钷','战']],
['level'=>'初级','jtz'=>'写','correct'=>'寫','arr'=>['寫','谢','夑','溺','枈','第']],
['level'=>'初级','jtz'=>'这','correct'=>'這','arr'=>['這','遮','李','籍','傈','其']],
['level'=>'初级','jtz'=>'冈','correct'=>'岡','arr'=>['岡','罔','矼','罡','冮','㠮']],
['level'=>'初级','jtz'=>'后','correct'=>'後','arr'=>['後','我','又','窩','次','复']],
['level'=>'初级','jtz'=>'产','correct'=>'産','arr'=>['産','不','生','彦','倍','步']],
['level'=>'初级','jtz'=>'图','correct'=>'圖','arr'=>['圖','手','守','圆','国','搜']],
['level'=>'初级','jtz'=>'晓','correct'=>'曉','arr'=>['曉','小','吓','下','嚣','戰']],
['level'=>'初级','jtz'=>'发','correct'=>'發','arr'=>['發','打','大','法','笪','茷']],
['level'=>'初级','jtz'=>'许','correct'=>'許','arr'=>['許','徐','嘘','浴','续','緖']],
['level'=>'初级','jtz'=>'区','correct'=>'區','arr'=>['區','去','入','脯','玊','蠕']],
['level'=>'初级','jtz'=>'课','correct'=>'課','arr'=>['課','了','可','勒','客','蝌']],
['level'=>'初级','jtz'=>'与','correct'=>'與','arr'=>['與','壳','棵','兴','渴','搕']],
['level'=>'初级','jtz'=>'号','correct'=>'號','arr'=>['號','好','高','喊','扞','蚝']],
['level'=>'初级','jtz'=>'块','correct'=>'塊','arr'=>['塊','快','筷','㧟','鲙','开']],
['level'=>'初级','jtz'=>'华','correct'=>'華','arr'=>['華','话','花','画','化','呚']],
['level'=>'初级','jtz'=>'帅','correct'=>'帥','arr'=>['帥','倞','瑡','铈','卛','亊']],
['level'=>'初级','jtz'=>'学','correct'=>'學','arr'=>['學','月','穴','箹','膤','閲']],
['level'=>'初级','jtz'=>'习','correct'=>'習','arr'=>['習','洗','睎','熙','孜','禧']],
['level'=>'初级','jtz'=>'东','correct'=>'東','arr'=>['東','懂','董','棟','衕','栋']],
['level'=>'初级','jtz'=>'鱼','correct'=>'魚','arr'=>['魚','过','滚','煮','渾','田']],
['level'=>'初级','jtz'=>'过','correct'=>'過','arr'=>['過','或','活','锅','获','漷']],
['level'=>'初级','jtz'=>'饱','correct'=>'飽','arr'=>['飽','半','抱','爆','糙','包']],
['level'=>'初级','jtz'=>'饿','correct'=>'餓','arr'=>['餓','饿','额','呃','鄂','代']],
['level'=>'初级','jtz'=>'尧','correct'=>'堯','arr'=>['堯','轮','菌','君','论','罗']],
['level'=>'初级','jtz'=>'旧','correct'=>'舊','arr'=>['舊','荲','杦','鈤','揂','驲']],
['level'=>'初级','jtz'=>'举','correct'=>'舉','arr'=>['舉','哭','剧','巨','录','褲']],
['level'=>'初级','jtz'=>'译','correct'=>'譯','arr'=>['譯','洗','伊','夷','媳','彝']],
['level'=>'初级','jtz'=>'宁','correct'=>'寧','arr'=>['寧','无','与','哎','茜','宓']],
['level'=>'初级','jtz'=>'谁','correct'=>'誰','arr'=>['誰','说','硕','难','説','無']],
['level'=>'初级','jtz'=>'儿','correct'=>'兒','arr'=>['兒','而','耳','尔','迩','洱']],
['level'=>'初级','jtz'=>'进','correct'=>'進','arr'=>['進','尽','立','紧','蔺','堇']],
['level'=>'初级','jtz'=>'迁','correct'=>'遷','arr'=>['遷','图','涂','吐','凸','徙']],
['level'=>'初级','jtz'=>'尽','correct'=>'盡','arr'=>['盡','林','浸','噤','巾','晉']],
['level'=>'初级','jtz'=>'执','correct'=>'執','arr'=>['執','只','之','止','嗯','恩']],
['level'=>'初级','jtz'=>'杰','correct'=>'傑','arr'=>['傑','接','借','街','截','介']],
['level'=>'初级','jtz'=>'颜','correct'=>'顏','arr'=>['顏','要','演','嫣','玩','藥']],
['level'=>'初级','jtz'=>'岭','correct'=>'嶺','arr'=>['嶺','别','东','峻','彻','束']],
['level'=>'初级','jtz'=>'爱','correct'=>'愛','arr'=>['愛','晖','瑗','瞏','喛','砹']],
['level'=>'初级','jtz'=>'胶','correct'=>'膠','arr'=>['膠','交','教','叫','撩','廖']],
['level'=>'初级','jtz'=>'补','correct'=>'補','arr'=>['補','哟','走','奏','卧','踒']],
['level'=>'初级','jtz'=>'阶','correct'=>'階','arr'=>['階','接','结','姐','醋','同']],
['level'=>'初级','jtz'=>'书','correct'=>'書','arr'=>['書','求','数','熟','淑','屬']],
['level'=>'初级','jtz'=>'苏','correct'=>'蘇','arr'=>['蘇','速','茹','诉','汝','愫']],
['level'=>'初级','jtz'=>'竞','correct'=>'競','arr'=>['競','领','机','几','及','卢']],
['level'=>'初级','jtz'=>'没','correct'=>'沒','arr'=>['沒','美','内','每','媒','枚']],
['level'=>'初级','jtz'=>'结','correct'=>'結','arr'=>['結','咧','介','烈','洁','劣']],
['level'=>'初级','jtz'=>'节','correct'=>'節','arr'=>['節','街','裤','劣','揭','傑']],
['level'=>'初级','jtz'=>'鸟','correct'=>'鳥','arr'=>['鳥','年','面','尿','免','绵']],
['level'=>'初级','jtz'=>'岁','correct'=>'嵗','arr'=>['嵗','年','苗','惗','廿','訬']],
['level'=>'初级','jtz'=>'术','correct'=>'術','arr'=>['術','衞','䊾','竖','睦','霂']],
['level'=>'初级','jtz'=>'职','correct'=>'職','arr'=>['職','与','于','吴','虚','云']],
['level'=>'初级','jtz'=>'头','correct'=>'頭','arr'=>['頭','偷','图','吐','骰','殕']],
['level'=>'初级','jtz'=>'闪','correct'=>'閃','arr'=>['閃','少','山','閄','汕','潛']],
['level'=>'初级','jtz'=>'门','correct'=>'門','arr'=>['門','嫩','焖','扪','悶','椚']],
['level'=>'初级','jtz'=>'余','correct'=>'餘','arr'=>['餘','来','佛','赖','來','徠']],
['level'=>'初级','jtz'=>'间','correct'=>'間','arr'=>['間','文','闻','溫','譖','聞']],
['level'=>'初级','jtz'=>'选','correct'=>'選','arr'=>['選','表','悶','恁','滿','钔']],
['level'=>'初级','jtz'=>'话','correct'=>'話','arr'=>['話','言','嚄','哗','諙','舎']],
['level'=>'初级','jtz'=>'队','correct'=>'隊','arr'=>['隊','怼','堆','兑','對','対']],
['level'=>'初级','jtz'=>'肃','correct'=>'肅','arr'=>['肅','櫁','塌','而','萧','溸']],
['level'=>'初级','jtz'=>'兴','correct'=>'興','arr'=>['興','哟','卒','起','淇','泗']],
['level'=>'初级','jtz'=>'较','correct'=>'較','arr'=>['較','件','间','练','了','觉']],
['level'=>'初级','jtz'=>'盐','correct'=>'鹽','arr'=>['鹽','來','监','开','徠','莱']],
['level'=>'初级','jtz'=>'伞','correct'=>'傘','arr'=>['傘','三','然','散','绕','叁']],
['level'=>'初级','jtz'=>'记','correct'=>'記','arr'=>['記','继','计','继','利','迹']],
['level'=>'初级','jtz'=>'圣','correct'=>'聖','arr'=>['聖','晟','昇','慹','挚','㞼']],
['level'=>'初级','jtz'=>'据','correct'=>'據','arr'=>['據','盧','勮','鉅','挙','伡']],
['level'=>'初级','jtz'=>'医','correct'=>'醫','arr'=>['醫','彬','阿','饿','太','和']],
['level'=>'初级','jtz'=>'飞','correct'=>'飛','arr'=>['飛','噢','找','人','唐','代']],
['level'=>'初级','jtz'=>'农','correct'=>'農','arr'=>['農','辰','跟','衣','其','得']],
['level'=>'初级','jtz'=>'朴','correct'=>'樸','arr'=>['樸','渪','菩','醋','很','上']],
['level'=>'初级','jtz'=>'庄','correct'=>'莊','arr'=>['莊','得','就','它','啥','会']],
['level'=>'初级','jtz'=>'无','correct'=>'無','arr'=>['無','庑','杌','邧','莁','俉']],
['level'=>'初级','jtz'=>'处','correct'=>'處','arr'=>['處','利','冀','祭','票','烔']],
['level'=>'初级','jtz'=>'体','correct'=>'體','arr'=>['體','栋','迷','泥','沵','覓']],
['level'=>'初级','jtz'=>'养','correct'=>'養','arr'=>['養','笑','沼','蘸','苋','去']],
['level'=>'初级','jtz'=>'邹','correct'=>'鄒','arr'=>['鄒','都','煮','住','休','嗅']],
['level'=>'初级','jtz'=>'币','correct'=>'幣','arr'=>['幣','笔','词','必','碍','碧']],
['level'=>'初级','jtz'=>'动','correct'=>'動','arr'=>['動','洞','峒','赌','度','服']],
['level'=>'初级','jtz'=>'丰','correct'=>'豐','arr'=>['豐','董','分','等','灯','冬']],
['level'=>'初级','jtz'=>'点','correct'=>'點','arr'=>['點','店','调','垫','典','甸']],
['level'=>'初级','jtz'=>'电','correct'=>'電','arr'=>['電','吊','洗','刁','趙','打']],
['level'=>'初级','jtz'=>'独','correct'=>'獨','arr'=>['獨','赌','付','复','负','辅']],
['level'=>'初级','jtz'=>'断','correct'=>'斷','arr'=>['斷','伏','妒','妇','捈','西']],
['level'=>'初级','jtz'=>'对','correct'=>'對','arr'=>['對','吋','卜','俗','起','奇']],
['level'=>'初级','jtz'=>'达','correct'=>'達','arr'=>['達','茷','阀','罚','读','其']],
['level'=>'初级','jtz'=>'岂','correct'=>'豈','arr'=>['豈','带','蹛','怠','傣','呔']],
['level'=>'初级','jtz'=>'带','correct'=>'帶','arr'=>['帶','岱','襶','貣','黛','呆']],
['level'=>'初级','jtz'=>'担','correct'=>'擔','arr'=>['擔','但','翻','旦','担','淡']],
['level'=>'初级','jtz'=>'庙','correct'=>'廟','arr'=>['廟','导','祠','院','煩','打']],
['level'=>'初级','jtz'=>'单','correct'=>'單','arr'=>['單','的','读','去','渪','謩']],
['level'=>'初级','jtz'=>'当','correct'=>'當','arr'=>['當','放','档','裆','常','负']],
['level'=>'初级','jtz'=>'风','correct'=>'風','arr'=>['風','疯','封','讽','凤','俸']],
['level'=>'中级','jtz'=>'报','correct'=>'報','arr'=>['報','緈','鳻','鳵','訊','鄩']],
['level'=>'中级','jtz'=>'贝','correct'=>'貝','arr'=>['貝','誖','軰','責','諀','䩀']],
['level'=>'中级','jtz'=>'备','correct'=>'備','arr'=>['備','䩀','庳','郥','貝','盃']],
['level'=>'中级','jtz'=>'吨','correct'=>'噸','arr'=>['噸','㪟','飩','噋','頓','霕']],
['level'=>'中级','jtz'=>'夺','correct'=>'奪','arr'=>['奪','陬','鄹','賭','陟','準']],
['level'=>'中级','jtz'=>'巩','correct'=>'鞏','arr'=>['鞏','磔','躓','躱','嶞','雖']],
['level'=>'中级','jtz'=>'汉','correct'=>'漢','arr'=>['漢','旰','湵','苃','阚','藳']],
['level'=>'中级','jtz'=>'坏','correct'=>'壞','arr'=>['壞','鈈','瞏','顧','萑','褢']],
['level'=>'中级','jtz'=>'欢','correct'=>'歡','arr'=>['歡','郇','歓','還','賈','鬟']],
['level'=>'中级','jtz'=>'环','correct'=>'環','arr'=>['環','鈈','萑','壞','鬟','歓']],
['level'=>'中级','jtz'=>'还','correct'=>'還','arr'=>['還','從','遈','軾','逭','縋']],
['level'=>'中级','jtz'=>'杂','correct'=>'雜','arr'=>['雜','囬','徻','匯','薈','叀']],
['level'=>'中级','jtz'=>'会','correct'=>'會','arr'=>['會','叀','曾','廻','逥','滙']],
['level'=>'中级','jtz'=>'连','correct'=>'連','arr'=>['連','鈺','運','朢','顒','鬻']],
['level'=>'中级','jtz'=>'汇','correct'=>'匯','arr'=>['匯','滙','洄','潓','會','泋']],
['level'=>'中级','jtz'=>'历','correct'=>'歷','arr'=>['歷','厲','麗','恊','荲','離']],
['level'=>'中级','jtz'=>'获','correct'=>'獲','arr'=>['獲','隻','綬','攉','彟','掝']],
['level'=>'中级','jtz'=>'护','correct'=>'護','arr'=>['護','隻','槴','俿','颯','嫭']],
['level'=>'中级','jtz'=>'壶','correct'=>'壺','arr'=>['壺','乕','喦','扈','觳','壹']],
['level'=>'中级','jtz'=>'沪','correct'=>'滬','arr'=>['滬','㳷','隻','滸','冱','淲']],
['level'=>'中级','jtz'=>'画','correct'=>'畫','arr'=>['畫','崋','婳','玅','宻','諣']],
['level'=>'中级','jtz'=>'划','correct'=>'劃','arr'=>['劃','㓰','牫','鏵','褂','㩇']],
['level'=>'中级','jtz'=>'济','correct'=>'濟','arr'=>['濟','旂','極','際','畢','幾']],
['level'=>'中级','jtz'=>'积','correct'=>'積','arr'=>['積','澧','戢','誋','敺','漈']],
['level'=>'中级','jtz'=>'饥','correct'=>'飢','arr'=>['飢','飨','畿','旣','澧','機']],
['level'=>'中级','jtz'=>'鸡','correct'=>'鷄','arr'=>['鷄','髻','裊','鳥','驥','繫']],
['level'=>'中级','jtz'=>'极','correct'=>'極','arr'=>['極','柩','厹','畿','蹟','馿']],
['level'=>'中级','jtz'=>'续','correct'=>'續','arr'=>['續','醯','聨','繼','褲','戯']],
['level'=>'中级','jtz'=>'辽','correct'=>'遼','arr'=>['遼','斎','麚','廰','駱','鴐']],
['level'=>'中级','jtz'=>'远','correct'=>'遠','arr'=>['遠','繮','講','攞','爉','儠']],
['level'=>'中级','jtz'=>'将','correct'=>'將','arr'=>['將','帥','講','繮','獎','掚']],
['level'=>'中级','jtz'=>'驿','correct'=>'驛','arr'=>['驛','辭','䮨','薏','郗','隰']],
['level'=>'中级','jtz'=>'浆','correct'=>'漿','arr'=>['漿','湬','蒦','瀘','䲀','柒']],
['level'=>'中级','jtz'=>'奋','correct'=>'奮','arr'=>['奮','從','惫','駟','禠','澧']],
['level'=>'中级','jtz'=>'酱','correct'=>'醬','arr'=>['醬','凉','蔣','疆','醤','所']],
['level'=>'中级','jtz'=>'讲','correct'=>'講','arr'=>['講','賈','唁','誰','説','噴']],
['level'=>'中级','jtz'=>'厂','correct'=>'廠','arr'=>['廠','軜','㨥','罵','嘜','礣']],
['level'=>'中级','jtz'=>'马','correct'=>'馬','arr'=>['馬','鳥','車','東','輪','挙']],
['level'=>'中级','jtz'=>'买','correct'=>'買','arr'=>['買','荬','賣','蛊','顧','霾']],
['level'=>'中级','jtz'=>'卖','correct'=>'賣','arr'=>['賣','奒','嬭','買','氖','熋']],
['level'=>'中级','jtz'=>'迈','correct'=>'邁','arr'=>['邁','還','逺','簉','彎','喒']],
['level'=>'中级','jtz'=>'麦','correct'=>'麥','arr'=>['麥','䨫','雲','䳸','習','苃']],
['level'=>'中级','jtz'=>'脉','correct'=>'脈','arr'=>['脈','臃','䔤','鬕','鎹','慫']],
['level'=>'中级','jtz'=>'灿','correct'=>'燦','arr'=>['燦','鹋','裊','懋','難','嫐']],
['level'=>'中级','jtz'=>'蛮','correct'=>'蠻','arr'=>['蠻','鬘','髪','廛','裏','鬧']],
['level'=>'中级','jtz'=>'梦','correct'=>'夢','arr'=>['夢','羅','薨','顭','霥','蠓']],
['level'=>'中级','jtz'=>'弥','correct'=>'彌','arr'=>['彌','伱','児','枈','爾','芈']],
['level'=>'中级','jtz'=>'盘','correct'=>'盤','arr'=>['盤','鋻','肇','鞶','鵥','參']],
['level'=>'中级','jtz'=>'辟','correct'=>'闢','arr'=>['闢','罴','鬪','廚','譬','訜']],
['level'=>'中级','jtz'=>'苹','correct'=>'蘋','arr'=>['蘋','驞','蓱','氫','芣','凴']],
['level'=>'中级','jtz'=>'凭','correct'=>'憑','arr'=>['憑','薲','凴','䝼','溄','慶']],
['level'=>'中级','jtz'=>'枪','correct'=>'槍','arr'=>['槍','倉','鋿','銃','啓','鋿']],
['level'=>'中级','jtz'=>'乔','correct'=>'喬','arr'=>['喬','晑','曏','翣','竅','郻']],
['level'=>'中级','jtz'=>'侨','correct'=>'僑','arr'=>['僑','覑','偂','媊','騫','梫']],
['level'=>'中级','jtz'=>'桥','correct'=>'橋','arr'=>['橋','芟','潛','繾','湋','萬']],
['level'=>'中级','jtz'=>'窍','correct'=>'竅','arr'=>['竅','窮','跫','掮','觷','㷀']],
['level'=>'中级','jtz'=>'窃','correct'=>'竊','arr'=>['竊','齵','齝','窮','舎','寔']],
['level'=>'中级','jtz'=>'亲','correct'=>'親','arr'=>['親','謦','見','琹','鬵','鴑']],
['level'=>'中级','jtz'=>'寝','correct'=>'寢','arr'=>['寢','暣','翍','禠','櫦','機']],
['level'=>'中级','jtz'=>'庆','correct'=>'慶','arr'=>['慶','私','擬','期','末','吋']],
['level'=>'中级','jtz'=>'穷','correct'=>'窮','arr'=>['窮','竆','橩','䆲','㢜','廣']],
['level'=>'中级','jtz'=>'时','correct'=>'時','arr'=>['時','莳','吋','識','諟','呩']],
['level'=>'中级','jtz'=>'盖','correct'=>'蓋','arr'=>['蓋','殛','厹','鹙','蘒','睪']],
['level'=>'中级','jtz'=>'曲','correct'=>'麯','arr'=>['麯','麸','耜','庿','詓','區']],
['level'=>'中级','jtz'=>'趋','correct'=>'趨','arr'=>['趨','縋','亁','㰸','懮','堹']],
['level'=>'中级','jtz'=>'权','correct'=>'權','arr'=>['權','観','鐉','勧','範','儞']],
['level'=>'中级','jtz'=>'韩','correct'=>'韓','arr'=>['韓','幹','乾','恏','贛','韡']],
['level'=>'中级','jtz'=>'确','correct'=>'確','arr'=>['確','顧','鶴','鏙','働','漢']],
['level'=>'中级','jtz'=>'让','correct'=>'讓','arr'=>['讓','懿','誌','蟥','鑲','戧']],
['level'=>'中级','jtz'=>'扰','correct'=>'擾','arr'=>['擾','羑','僾','阌','誮','僞']],
['level'=>'中级','jtz'=>'热','correct'=>'熱','arr'=>['熱','倏','㻰','數','訄','顇']],
['level'=>'中级','jtz'=>'认','correct'=>'認','arr'=>['認','任','綛','蹵','哦','做']],
['level'=>'中级','jtz'=>'荣','correct'=>'榮','arr'=>['榮','嘩','富','贵','复','蠱']],
['level'=>'中级','jtz'=>'晒','correct'=>'曬','arr'=>['曬','醯','㒶','穸','隰','䚓']],
['level'=>'中级','jtz'=>'伤','correct'=>'傷','arr'=>['傷','翣','釖','鯓','澂','聲']],
['level'=>'中级','jtz'=>'阴','correct'=>'陰','arr'=>['陰','舎','餂','騇','舚','嚈']],
['level'=>'中级','jtz'=>'聂','correct'=>'聶','arr'=>['聶','啟','甙','譬','頫','覚']],
['level'=>'中级','jtz'=>'沈','correct'=>'瀋','arr'=>['瀋','逡','䔤','廰','䵀','廛']],
['level'=>'中级','jtz'=>'审','correct'=>'審','arr'=>['審','訷','禮','綈','惫','儸']],
['level'=>'中级','jtz'=>'渗','correct'=>'滲','arr'=>['滲','粲','諨','澲','秫','渕']],
['level'=>'中级','jtz'=>'绣','correct'=>'綉','arr'=>['綉','縤','銹','棴','髤','繡']],
['level'=>'中级','jtz'=>'长','correct'=>'長','arr'=>['長','韔','兏','從','赱','㞫']],
['level'=>'中级','jtz'=>'乐','correct'=>'樂','arr'=>['樂','䀥','阞','竻','東','郷']],
['level'=>'中级','jtz'=>'云','correct'=>'雲','arr'=>['雲','贇','䢵','秐','暈','雩']],
['level'=>'中级','jtz'=>'显','correct'=>'顯','arr'=>['顯','鬥','嫺','睍','俅','縣']],
['level'=>'中级','jtz'=>'个','correct'=>'個','arr'=>['個','伱','傘','傦','閤','佫']],
['level'=>'中级','jtz'=>'县','correct'=>'縣','arr'=>['縣','顯','綫','晛','僴','県']],
['level'=>'中级','jtz'=>'向','correct'=>'嚮','arr'=>['嚮','絧','啓','芗','漲','晑']],
['level'=>'中级','jtz'=>'响','correct'=>'響','arr'=>['響','曏','晑','亯','嚮','帳']],
['level'=>'中级','jtz'=>'乡','correct'=>'鄉','arr'=>['鄉','飨','縣','顕','緗','餉']],
['level'=>'中级','jtz'=>'协','correct'=>'協','arr'=>['協','絲','刕','愶','夑','頁']],
['level'=>'中级','jtz'=>'御','correct'=>'禦','arr'=>['禦','衞','潔','敔','彧','續']],
['level'=>'中级','jtz'=>'吁','correct'=>'籲','arr'=>['籲','彧','勖','呴','盨','欤']],
['level'=>'中级','jtz'=>'郁','correct'=>'鬱','arr'=>['鬱','覦','欤','䱷','雩','欎']],
['level'=>'中级','jtz'=>'种','correct'=>'種','arr'=>['種','蔠','慫','尰','應','鷹']],
['level'=>'中级','jtz'=>'国','correct'=>'國','arr'=>['國','囵','質','圜','襖','標']],
['level'=>'中级','jtz'=>'说','correct'=>'説','arr'=>['説','誰','唁','譵','詮','鍍']],
['level'=>'中级','jtz'=>'艰','correct'=>'艱','arr'=>['艱','妕','眾','盅','幒','礳']],
['level'=>'中级','jtz'=>'转','correct'=>'轉','arr'=>['轉','喌','嚋','睭','翢','箃']],
['level'=>'中级','jtz'=>'昼','correct'=>'晝','arr'=>['晝','晷','盡','勗','昫','牗']],
['level'=>'高级','jtz'=>'车','correct'=>'車','arr'=>['車','俥','砗','奲','㒤','駒']],
['level'=>'高级','jtz'=>'么','correct'=>'麽','arr'=>['麽','幺','庅','嚜','嚰','伝']],
['level'=>'高级','jtz'=>'仅','correct'=>'僅','arr'=>['僅','瑾','經','迳','経','肼']],
['level'=>'高级','jtz'=>'扑','correct'=>'撲','arr'=>['撲','巬','蒱','轐','鳪','暜']],
['level'=>'高级','jtz'=>'佣','correct'=>'傭','arr'=>['傭','縱','壅','樅','擁','颙']],
['level'=>'高级','jtz'=>'几','correct'=>'幾','arr'=>['幾','戢','亼','玑','丌','髻']],
['level'=>'高级','jtz'=>'兰','correct'=>'蘭','arr'=>['蘭','罱','藍','葻','懢','厱']],
['level'=>'高级','jtz'=>'办','correct'=>'辦','arr'=>['辦','恊','絆','闆','㩯','㸞']],
['level'=>'高级','jtz'=>'艺','correct'=>'兿','arr'=>['兿','繹','翌','迤','蕓','異']],
['level'=>'高级','jtz'=>'丛','correct'=>'叢','arr'=>['叢','從','蕬','枞','蓯','衆']],
['level'=>'高级','jtz'=>'岩','correct'=>'巖','arr'=>['巖','尒','㚷','儼','児','嚴']],
['level'=>'高级','jtz'=>'冯','correct'=>'馮','arr'=>['馮','渢','慿','溄','遤','夆']],
['level'=>'高级','jtz'=>'广','correct'=>'廣','arr'=>['廣','広','劻','鄺','誆','懬']],
['level'=>'高级','jtz'=>'厌','correct'=>'厭','arr'=>['厭','狋','儼','厴','魇','檐']],
['level'=>'高级','jtz'=>'仑','correct'=>'侖','arr'=>['侖','囵','倉','崑','坒','啓']],
['level'=>'高级','jtz'=>'尔','correct'=>'爾','arr'=>['爾','兒','尒','璽','妳','㛅']],
['level'=>'高级','jtz'=>'气','correct'=>'氣','arr'=>['氣','気','棄','懠','芞','柒']],
['level'=>'高级','jtz'=>'台','correct'=>'臺','arr'=>['臺','夳','枱','奤','阖','薹']],
['level'=>'高级','jtz'=>'礼','correct'=>'禮','arr'=>['禮','孋','栎','瓅','離','譗']],
['level'=>'高级','jtz'=>'笔','correct'=>'筆','arr'=>['筆','毞','畢','滗','幣','斞']],
['level'=>'高级','jtz'=>'仓','correct'=>'倉','arr'=>['倉','仺','啓','篬','欌','蒼']],
['level'=>'高级','jtz'=>'斗','correct'=>'鬥','arr'=>['鬥','乧','閗','鬪','阧','鬭']],
['level'=>'高级','jtz'=>'猎','correct'=>'獵','arr'=>['獵','狶','癙','豨','豘','鶐']],
['level'=>'高级','jtz'=>'临','correct'=>'臨','arr'=>['臨','啓','龀','廪','眔','盡']],
['level'=>'高级','jtz'=>'邻','correct'=>'鄰','arr'=>['鄰','憐','鴒','臨','閝','嶙']],
['level'=>'高级','jtz'=>'隶','correct'=>'隸','arr'=>['隸','麗','盡','書','隷','琭']],
['level'=>'高级','jtz'=>'帘','correct'=>'簾','arr'=>['簾','纞','經','練','缙','巠']],
['level'=>'高级','jtz'=>'联','correct'=>'聯','arr'=>['聯','聮','窷','闗','裢','聨']],
['level'=>'高级','jtz'=>'恋','correct'=>'戀','arr'=>['戀','巒','愢','㥕','孞','皨']],
['level'=>'高级','jtz'=>'怜','correct'=>'憐','arr'=>['憐','懔','慩','聮','瓴','軨']],
['level'=>'高级','jtz'=>'寿','correct'=>'壽','arr'=>['壽','錬','歛','鑑','凍','燾']],
['level'=>'高级','jtz'=>'滩','correct'=>'灘','arr'=>['灘','戁','墰','繵','摭','弢']],
['level'=>'高级','jtz'=>'钟','correct'=>'鐘','arr'=>['鐘','種','鋼','鐵','穜','曈']],
['level'=>'高级','jtz'=>'众','correct'=>'衆','arr'=>['衆','眾','㠑','從','祂','叒']],
['level'=>'高级','jtz'=>'别','correct'=>'彆','arr'=>['彆','彎','幣','徶','㢼','䇷']],
['level'=>'高级','jtz'=>'伙','correct'=>'夥','arr'=>['夥','吙','鈥','躱','湱','秮']],
['level'=>'高级','jtz'=>'条','correct'=>'條','arr'=>['條','誂','龆','覜','髫','椟']],
['level'=>'高级','jtz'=>'椭','correct'=>'橢','arr'=>['橢','瀡','嶞','䫂','跢','䉌']],
['level'=>'高级','jtz'=>'粜','correct'=>'糶','arr'=>['糶','羋','縻','爢','㝥','宻']],
['level'=>'高级','jtz'=>'松','correct'=>'鬆','arr'=>['鬆','髪','崧','菘','發','髸']],
['level'=>'高级','jtz'=>'里','correct'=>'裏','arr'=>['裏','裹','禮','俚','罹','厲']],
['level'=>'高级','jtz'=>'厅','correct'=>'廳','arr'=>['廳','庁','颋','町','渟','颋']],
['level'=>'高级','jtz'=>'党','correct'=>'黨','arr'=>['黨','當','熏','窨','谠','瓽']],
['level'=>'高级','jtz'=>'寻','correct'=>'尋','arr'=>['尋','噵','導','勳','噀','蕁']],
['level'=>'高级','jtz'=>'蜡','correct'=>'臘','arr'=>['臘','蝋','醯','爞','輑','蹖']],
['level'=>'高级','jtz'=>'亵','correct'=>'褻','arr'=>['褻','慹','製','疌','燮','奊']],
['level'=>'高级','jtz'=>'见','correct'=>'見','arr'=>['見','児','県','柬','蕳','僭']],
['level'=>'高级','jtz'=>'献','correct'=>'獻','arr'=>['獻','䱷','蘸','覦','曉','酰']],
['level'=>'高级','jtz'=>'咸','correct'=>'鹹','arr'=>['鹹','諴','賎','醎','牋','綫']],
['level'=>'高级','jtz'=>'亏','correct'=>'虧','arr'=>['虧','誇','匱','㰪','謉','瞶']],
['level'=>'高级','jtz'=>'宪','correct'=>'憲','arr'=>['憲','娴','苋','羡','線','箫']],
['level'=>'高级','jtz'=>'丑','correct'=>'醜','arr'=>['醜','醴','䏔','殠','酧','醒']],
['level'=>'高级','jtz'=>'为','correct'=>'爲','arr'=>['爲','衞','偉','偽','琟','韡']],
['level'=>'高级','jtz'=>'叹','correct'=>'嘆','arr'=>['嘆','談','歎','嘽','於','譚']],
['level'=>'高级','jtz'=>'义','correct'=>'義','arr'=>['義','噫','叕','刈','訍','羑']],
['level'=>'高级','jtz'=>'劝','correct'=>'勸','arr'=>['勸','勧','呖','鐉','詮','恊']],
['level'=>'高级','jtz'=>'凤','correct'=>'鳯','arr'=>['鳯','偑','鴌','裊','蔦','凰']],
['level'=>'高级','jtz'=>'尘','correct'=>'塵','arr'=>['塵','嵞','盧','椉','敐','曟']],
['level'=>'高级','jtz'=>'优','correct'=>'優','arr'=>['優','岽','乗','憂','胨','騬']],
['level'=>'高级','jtz'=>'衬','correct'=>'襯','arr'=>['襯','稱','籿','拵','偁','刌']],
['level'=>'高级','jtz'=>'传','correct'=>'傳','arr'=>['傳','铖','槍','珵','傅','徎']],
['level'=>'高级','jtz'=>'称','correct'=>'稱','arr'=>['稱','撐','觕','陑','迩','郕']],
['level'=>'高级','jtz'=>'惩','correct'=>'懲','arr'=>['懲','塵','恖','癥','愸','澂']],
['level'=>'高级','jtz'=>'骋','correct'=>'騁','arr'=>['騁','獁','驞','逰','懃','鼬']],
['level'=>'高级','jtz'=>'迟','correct'=>'遲','arr'=>['遲','樨','懘','遅','叺','竾']],
['level'=>'高级','jtz'=>'驰','correct'=>'馳','arr'=>['馳','吔','勑','踟','遅','鷌']],
['level'=>'高级','jtz'=>'耻','correct'=>'恥','arr'=>['恥','慹','褫','織','荹','迩']],
['level'=>'高级','jtz'=>'齿','correct'=>'齒','arr'=>['齒','筮','齝','龂','笭','歯']],
['level'=>'高级','jtz'=>'炽','correct'=>'熾','arr'=>['熾','奭','膣','熫','吙','鋕']],
['level'=>'高级','jtz'=>'纯','correct'=>'純','arr'=>['純','酫','漘','醇','杶','醕']],
['level'=>'高级','jtz'=>'绰','correct'=>'綽','arr'=>['綽','棳','娺','辵','孎','鏃']],
['level'=>'高级','jtz'=>'辞','correct'=>'辭','arr'=>['辭','詞','訫','謃','礠','話']],
['level'=>'高级','jtz'=>'聪','correct'=>'聰','arr'=>['聰','総','緃','骢','辏','總']],
['level'=>'高级','jtz'=>'葱','correct'=>'蔥','arr'=>['蔥','璁','樅','賩','鍯','鏓']],
['level'=>'高级','jtz'=>'囱','correct'=>'囪','arr'=>['囪','鹵','塸','敺','甌','穸']],
['level'=>'高级','jtz'=>'矾','correct'=>'礬','arr'=>['礬','鞶','範','咭','忛','軓']],
['level'=>'高级','jtz'=>'横','correct'=>'橫','arr'=>['橫','趪','廣','鑅','恆','㶇']],
['level'=>'高级','jtz'=>'轰','correct'=>'轟','arr'=>['轟','叒','黉','鬨','䨇','俥']],
['level'=>'高级','jtz'=>'鸿','correct'=>'鴻','arr'=>['鴻','翝','鵬','樢','浲','渱']],
['level'=>'高级','jtz'=>'卢','correct'=>'盧','arr'=>['盧','滹','槴','轳','盝','蘆']],
['level'=>'高级','jtz'=>'专','correct'=>'專','arr'=>['專','叀','埘','昰','遈','㼷']],
['level'=>'高级','jtz'=>'业','correct'=>'業','arr'=>['業','葉','枼','枽','埜','嶪']],
['level'=>'高级','jtz'=>'馁','correct'=>'餒','arr'=>['餒','訥','誶','雖','橤','褥']],
['level'=>'高级','jtz'=>'萝','correct'=>'蘿','arr'=>['蘿','瞢','斖','瓾','夣','蘆']],
['level'=>'高级','jtz'=>'凛','correct'=>'凜','arr'=>['凜','棅','潾','溗','檩','寖']],
['level'=>'高级','jtz'=>'斋','correct'=>'齋','arr'=>['齋','經','紊','忞','齊','啓']],
['level'=>'高级','jtz'=>'谷','correct'=>'穀','arr'=>['穀','殕','彀','蠱','鍮','倉']],
['level'=>'高级','jtz'=>'顾','correct'=>'顧','arr'=>['顧','頭','諳','雇','僱','瞽']],
['level'=>'高级','jtz'=>'归','correct'=>'歸','arr'=>['歸','滙','匦','帰','埽','樻']],
['level'=>'高级','jtz'=>'龟','correct'=>'龜','arr'=>['龜','鼍','電','嬰','輋','阄']],
['level'=>'高级','jtz'=>'宝','correct'=>'寶','arr'=>['寶','㧔','實','懐','賓','蘹']],
['level'=>'高级','jtz'=>'龙','correct'=>'龍','arr'=>['龍','尨','龐','鸗','麀','襲']],
['level'=>'高级','jtz'=>'购','correct'=>'購','arr'=>['購','鉤','彀','遘','笱','珼']],
['level'=>'高级','jtz'=>'犹','correct'=>'猶','arr'=>['猶','衎','擀','猷','酐','桀']],
['level'=>'高级','jtz'=>'厩','correct'=>'廄','arr'=>['廄','厠','閬','䃹','柩','廊']],
['level'=>'高级','jtz'=>'荐','correct'=>'薦','arr'=>['薦','菅','侟','憱','驚','縬']],
['level'=>'高级','jtz'=>'秽','correct'=>'穢','arr'=>['穢','瀡','縗','檖','翙','滹']],
['level'=>'高级','jtz'=>'洒','correct'=>'灑','arr'=>['灑','漉','醴','湵','沋','汃']],
['level'=>'高级','jtz'=>'琼','correct'=>'瓊','arr'=>['瓊','亰','邛','誩','瞏','窮']],
['level'=>'高级','jtz'=>'衅','correct'=>'釁','arr'=>['釁','饮','馫','訾','嬜','畔']],];

foreach ($arr as $key => $value) {
    $obj = new FtzExt;
    $obj->level = $value['level']=='初级'?1:($value['level']=='中级'?2:3);
    $obj->jtz = $value['jtz'];
    $obj->correct = $value['correct'];
    shuffle($value['arr']);
    foreach (range(1, 6) as $v) {
        $un = 'ftz'.$v;
        $obj->$un = $value['arr'][$v-1];
    }
    // var_dump($obj->attributes);exit;
    $obj->save();
}

    }
}