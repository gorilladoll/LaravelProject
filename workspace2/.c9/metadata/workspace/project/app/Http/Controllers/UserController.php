{"filter":false,"title":"UserController.php","tooltip":"/project/app/Http/Controllers/UserController.php","undoManager":{"mark":88,"position":88,"stack":[[{"start":{"row":43,"column":5},"end":{"row":44,"column":0},"action":"insert","lines":["",""],"id":77},{"start":{"row":44,"column":0},"end":{"row":44,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":44,"column":4},"end":{"row":45,"column":0},"action":"insert","lines":["",""],"id":78},{"start":{"row":45,"column":0},"end":{"row":45,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":45,"column":4},"end":{"row":45,"column":5},"action":"insert","lines":["p"],"id":79}],[{"start":{"row":45,"column":5},"end":{"row":45,"column":6},"action":"insert","lines":["u"],"id":80}],[{"start":{"row":45,"column":6},"end":{"row":45,"column":7},"action":"insert","lines":["l"],"id":81}],[{"start":{"row":45,"column":7},"end":{"row":45,"column":8},"action":"insert","lines":["i"],"id":82}],[{"start":{"row":45,"column":8},"end":{"row":45,"column":9},"action":"insert","lines":["c"],"id":83}],[{"start":{"row":45,"column":9},"end":{"row":45,"column":10},"action":"insert","lines":[" "],"id":84}],[{"start":{"row":45,"column":9},"end":{"row":45,"column":10},"action":"remove","lines":[" "],"id":85}],[{"start":{"row":45,"column":8},"end":{"row":45,"column":9},"action":"remove","lines":["c"],"id":86}],[{"start":{"row":45,"column":7},"end":{"row":45,"column":8},"action":"remove","lines":["i"],"id":87}],[{"start":{"row":45,"column":6},"end":{"row":45,"column":7},"action":"remove","lines":["l"],"id":88}],[{"start":{"row":45,"column":6},"end":{"row":45,"column":7},"action":"insert","lines":["b"],"id":89}],[{"start":{"row":45,"column":7},"end":{"row":45,"column":8},"action":"insert","lines":["l"],"id":90}],[{"start":{"row":45,"column":8},"end":{"row":45,"column":9},"action":"insert","lines":["i"],"id":91}],[{"start":{"row":45,"column":9},"end":{"row":45,"column":10},"action":"insert","lines":["c"],"id":92}],[{"start":{"row":45,"column":10},"end":{"row":45,"column":11},"action":"insert","lines":[" "],"id":93}],[{"start":{"row":45,"column":4},"end":{"row":45,"column":11},"action":"remove","lines":["public "],"id":94},{"start":{"row":45,"column":4},"end":{"row":57,"column":5},"action":"insert","lines":["public function regist(Request $req){","    \t$users = new User;","","    \t$users->email \t\t\t\t= $req->input('email');","    \t$users->password \t\t\t= $req->input('password');","    \t$users->attention_location\t= $req->input('attention');","    \t$users->name                = $req->input('nick_name');","    \t$users->nick_name\t\t\t= $req->input('nick_name');","    \t$users->own_flea\t\t\t= 10000;","","    \t$users->save();","    \treturn response('완료');","    }"]}],[{"start":{"row":45,"column":20},"end":{"row":45,"column":26},"action":"remove","lines":["regist"],"id":95},{"start":{"row":45,"column":20},"end":{"row":45,"column":21},"action":"insert","lines":["a"]}],[{"start":{"row":45,"column":21},"end":{"row":45,"column":22},"action":"insert","lines":["l"],"id":96}],[{"start":{"row":45,"column":22},"end":{"row":45,"column":23},"action":"insert","lines":["e"],"id":97}],[{"start":{"row":45,"column":23},"end":{"row":45,"column":24},"action":"insert","lines":["r"],"id":98}],[{"start":{"row":45,"column":23},"end":{"row":45,"column":24},"action":"remove","lines":["r"],"id":99}],[{"start":{"row":45,"column":22},"end":{"row":45,"column":23},"action":"remove","lines":["e"],"id":100}],[{"start":{"row":45,"column":22},"end":{"row":45,"column":23},"action":"insert","lines":["a"],"id":101}],[{"start":{"row":45,"column":23},"end":{"row":45,"column":24},"action":"insert","lines":["r"],"id":102}],[{"start":{"row":45,"column":24},"end":{"row":45,"column":25},"action":"insert","lines":["m"],"id":103}],[{"start":{"row":45,"column":25},"end":{"row":45,"column":26},"action":"insert","lines":["C"],"id":104}],[{"start":{"row":45,"column":20},"end":{"row":45,"column":26},"action":"remove","lines":["alarmC"],"id":105},{"start":{"row":45,"column":20},"end":{"row":45,"column":30},"action":"insert","lines":["alarmCheck"]}],[{"start":{"row":46,"column":5},"end":{"row":56,"column":27},"action":"remove","lines":["$users = new User;","","    \t$users->email \t\t\t\t= $req->input('email');","    \t$users->password \t\t\t= $req->input('password');","    \t$users->attention_location\t= $req->input('attention');","    \t$users->name                = $req->input('nick_name');","    \t$users->nick_name\t\t\t= $req->input('nick_name');","    \t$users->own_flea\t\t\t= 10000;","","    \t$users->save();","    \treturn response('완료');"],"id":106}],[{"start":{"row":46,"column":5},"end":{"row":46,"column":6},"action":"insert","lines":["$"],"id":107}],[{"start":{"row":46,"column":6},"end":{"row":46,"column":7},"action":"insert","lines":["r"],"id":108}],[{"start":{"row":46,"column":7},"end":{"row":46,"column":8},"action":"insert","lines":["e"],"id":109}],[{"start":{"row":46,"column":8},"end":{"row":46,"column":9},"action":"insert","lines":["c"],"id":110}],[{"start":{"row":46,"column":9},"end":{"row":46,"column":10},"action":"insert","lines":["o"],"id":111}],[{"start":{"row":46,"column":10},"end":{"row":46,"column":11},"action":"insert","lines":["m"],"id":112}],[{"start":{"row":46,"column":11},"end":{"row":46,"column":12},"action":"insert","lines":["m"],"id":113}],[{"start":{"row":46,"column":12},"end":{"row":46,"column":13},"action":"insert","lines":["e"],"id":114}],[{"start":{"row":46,"column":13},"end":{"row":46,"column":14},"action":"insert","lines":["n"],"id":115}],[{"start":{"row":46,"column":14},"end":{"row":46,"column":15},"action":"insert","lines":["d"],"id":116}],[{"start":{"row":46,"column":15},"end":{"row":46,"column":16},"action":"insert","lines":["I"],"id":117}],[{"start":{"row":46,"column":16},"end":{"row":46,"column":17},"action":"insert","lines":["n"],"id":118}],[{"start":{"row":46,"column":17},"end":{"row":46,"column":18},"action":"insert","lines":["f"],"id":119}],[{"start":{"row":46,"column":18},"end":{"row":46,"column":19},"action":"insert","lines":["o"],"id":120}],[{"start":{"row":46,"column":19},"end":{"row":46,"column":20},"action":"insert","lines":[" "],"id":121}],[{"start":{"row":46,"column":20},"end":{"row":46,"column":21},"action":"insert","lines":["="],"id":122}],[{"start":{"row":46,"column":21},"end":{"row":46,"column":22},"action":"insert","lines":[" "],"id":123}],[{"start":{"row":46,"column":22},"end":{"row":46,"column":23},"action":"insert","lines":["$"],"id":124}],[{"start":{"row":46,"column":23},"end":{"row":46,"column":24},"action":"insert","lines":["r"],"id":125}],[{"start":{"row":46,"column":24},"end":{"row":46,"column":25},"action":"insert","lines":["e"],"id":126}],[{"start":{"row":46,"column":25},"end":{"row":46,"column":26},"action":"insert","lines":["q"],"id":127}],[{"start":{"row":46,"column":26},"end":{"row":46,"column":27},"action":"insert","lines":["-"],"id":128}],[{"start":{"row":46,"column":27},"end":{"row":46,"column":28},"action":"insert","lines":[">"],"id":129}],[{"start":{"row":46,"column":28},"end":{"row":46,"column":29},"action":"insert","lines":["i"],"id":130}],[{"start":{"row":46,"column":29},"end":{"row":46,"column":30},"action":"insert","lines":["n"],"id":131}],[{"start":{"row":46,"column":30},"end":{"row":46,"column":31},"action":"insert","lines":["p"],"id":132}],[{"start":{"row":46,"column":31},"end":{"row":46,"column":32},"action":"insert","lines":["u"],"id":133}],[{"start":{"row":46,"column":32},"end":{"row":46,"column":33},"action":"insert","lines":["t"],"id":134}],[{"start":{"row":46,"column":33},"end":{"row":46,"column":35},"action":"insert","lines":["()"],"id":135}],[{"start":{"row":46,"column":35},"end":{"row":46,"column":36},"action":"insert","lines":[";"],"id":136}],[{"start":{"row":46,"column":34},"end":{"row":46,"column":36},"action":"insert","lines":["''"],"id":137}],[{"start":{"row":46,"column":35},"end":{"row":46,"column":36},"action":"insert","lines":["r"],"id":138}],[{"start":{"row":46,"column":36},"end":{"row":46,"column":37},"action":"insert","lines":["e"],"id":139}],[{"start":{"row":46,"column":37},"end":{"row":46,"column":38},"action":"insert","lines":["c"],"id":140}],[{"start":{"row":46,"column":38},"end":{"row":46,"column":39},"action":"insert","lines":["o"],"id":141}],[{"start":{"row":46,"column":39},"end":{"row":46,"column":40},"action":"insert","lines":["m"],"id":142}],[{"start":{"row":46,"column":40},"end":{"row":46,"column":41},"action":"insert","lines":["m"],"id":143}],[{"start":{"row":46,"column":41},"end":{"row":46,"column":42},"action":"insert","lines":["e"],"id":144}],[{"start":{"row":46,"column":42},"end":{"row":46,"column":43},"action":"insert","lines":["n"],"id":145}],[{"start":{"row":46,"column":43},"end":{"row":46,"column":44},"action":"insert","lines":["d"],"id":146}],[{"start":{"row":46,"column":44},"end":{"row":46,"column":45},"action":"insert","lines":["I"],"id":147}],[{"start":{"row":46,"column":45},"end":{"row":46,"column":46},"action":"insert","lines":["n"],"id":148}],[{"start":{"row":46,"column":46},"end":{"row":46,"column":47},"action":"insert","lines":["f"],"id":149}],[{"start":{"row":46,"column":47},"end":{"row":46,"column":48},"action":"insert","lines":["o"],"id":150}],[{"start":{"row":46,"column":51},"end":{"row":47,"column":0},"action":"insert","lines":["",""],"id":151},{"start":{"row":47,"column":0},"end":{"row":47,"column":5},"action":"insert","lines":["    \t"]}],[{"start":{"row":47,"column":5},"end":{"row":48,"column":0},"action":"insert","lines":["",""],"id":152},{"start":{"row":48,"column":0},"end":{"row":48,"column":5},"action":"insert","lines":["    \t"]}],[{"start":{"row":48,"column":5},"end":{"row":49,"column":0},"action":"insert","lines":["",""],"id":153},{"start":{"row":49,"column":0},"end":{"row":49,"column":5},"action":"insert","lines":["    \t"]}],[{"start":{"row":49,"column":5},"end":{"row":51,"column":55},"action":"insert","lines":[" $result = $pickOutCategory;","        // $callback = $req->input('callback');","        // echo $callback.\"(\".json_encode($result).\")\";"],"id":154}],[{"start":{"row":50,"column":8},"end":{"row":50,"column":11},"action":"remove","lines":["// "],"id":155},{"start":{"row":51,"column":8},"end":{"row":51,"column":11},"action":"remove","lines":["// "]}],[{"start":{"row":49,"column":5},"end":{"row":49,"column":6},"action":"remove","lines":[" "],"id":156}],[{"start":{"row":47,"column":5},"end":{"row":48,"column":0},"action":"insert","lines":["",""],"id":157},{"start":{"row":48,"column":0},"end":{"row":48,"column":5},"action":"insert","lines":["    \t"]}],[{"start":{"row":50,"column":15},"end":{"row":50,"column":31},"action":"remove","lines":["$pickOutCategory"],"id":158},{"start":{"row":50,"column":15},"end":{"row":50,"column":29},"action":"insert","lines":["$recommendInfo"]}],[{"start":{"row":48,"column":5},"end":{"row":48,"column":6},"action":"insert","lines":["$"],"id":159}],[{"start":{"row":48,"column":5},"end":{"row":48,"column":6},"action":"remove","lines":["$"],"id":160}],[{"start":{"row":48,"column":5},"end":{"row":48,"column":6},"action":"insert","lines":["$"],"id":161}],[{"start":{"row":48,"column":5},"end":{"row":48,"column":6},"action":"remove","lines":["$"],"id":162}],[{"start":{"row":48,"column":5},"end":{"row":48,"column":6},"action":"insert","lines":["$"],"id":163}],[{"start":{"row":48,"column":5},"end":{"row":48,"column":6},"action":"remove","lines":["$"],"id":164}],[{"start":{"row":45,"column":4},"end":{"row":45,"column":7},"action":"insert","lines":["// "],"id":165},{"start":{"row":46,"column":4},"end":{"row":46,"column":7},"action":"insert","lines":["// "]},{"start":{"row":50,"column":4},"end":{"row":50,"column":7},"action":"insert","lines":["// "]},{"start":{"row":51,"column":4},"end":{"row":51,"column":7},"action":"insert","lines":["// "]},{"start":{"row":52,"column":4},"end":{"row":52,"column":7},"action":"insert","lines":["// "]},{"start":{"row":53,"column":4},"end":{"row":53,"column":7},"action":"insert","lines":["// "]}]]},"ace":{"folds":[],"scrolltop":774.5,"scrollleft":0,"selection":{"start":{"row":45,"column":7},"end":{"row":53,"column":8},"isBackwards":true},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":42,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1502036674223,"hash":"428488b77414c48c7e560b86bd1d22b1cb04b11d"}