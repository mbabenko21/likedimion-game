<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 03.12.2015
 * Time: 2:23
 */

return [
    "loc.0"=>		"Welcome|1|к лекарю|loc.lek1|к магазину драгоценностей|loc.drag1|по дороге на юг|loc.sklad1",
    "loc.lek1"=>	"Двор лекаря|1|войти в дом|loc.lek|к Академии|loc.ak1|к банку|loc.bank1|на юг|loc.0",
    "loc.lek"=>		"Дом лекаря|1|выйти на улицу|loc.lek1",
    "loc.drag1"=>	"Перед магазином драгоценностей|1|войти в дом|loc.drag|на восток|loc.tenal|на запад|loc.0",
    "loc.drag"=>	"Магазин драгоценностей|1|выйти на улицу|loc.drag1",
    "loc.sklad1"=>	"Дорога к складу|1|к складу|loc.sklad2|к южным воротам|loc.uv|на север|loc.0",
    "loc.sklad2"=>	"Около склада|1|войти в склад|loc.sklad|войти в магазин|loc.reg|на восток|loc.jd3|на запад|loc.sklad1",
    "loc.sklad"=>	"На складе|0|выйти на улицу|loc.sklad2",
    "loc.reg"=>		"Магазин реагентов|1|выйти на улицу|loc.sklad2",
    "loc.jd3"=>		"Жилые дома|1|к складу|loc.sklad2|на восток|loc.jd4|на север|loc.jd1",
    "loc.jd4"=>		"Трущобы|0|на запад|loc.jd3|к особняку|loc.jd2",
    "loc.jd2"=>		"Около особняка|1|к особняку|loc.osobn|на север|loc.tenal|на запад|loc.jd1|в трущобы на юге|loc.jd4",
    "loc.jd1"=>		"Жилые дома|1|к особняку|loc.jd2|к тенистой аллее|loc.tenal|на юг|loc.jd3",
    "loc.osobn"=>	"Особняк|1|выйти из особняка|loc.jd2",
    "loc.tenal"=>	"Тенистая аллея|1|восточные ворота|loc.vv|к магазину|loc.drag1|в жилой район|loc.jd1|в жилой район на восток|loc.jd2",
    "loc.vv"=>		"Восточные ворота|1|выйти из города|loc.zvv|на площадь|loc.vpl|к Академии|loc.ak1|к тенистой аллее|loc.tenal",
    "loc.vpl"=>		"Восточная площадь|1|к восточным воротам|loc.vv",
    "loc.ak1"=>		"Перед Академией|1|войти в Академию|loc.ak|к конюшне|loc.kon1|к восточным воротам|loc.vv|к дому лекаря|loc.lek1|к банку|loc.bank1",
    "loc.bank1"=>	"Перед банком|1|войти в банк|loc.bank|к Академии|loc.ak1|к лекарю|loc.lek1|на юг|loc.centr1|на запад|loc.cpl",
    "loc.bank"=>	"В банке|1|южная дверь|loc.bank1|западная дверь|loc.bank2",
    "loc.bank2"=>	"Около банка|1|войти в банк|loc.bank|к конюшне|loc.kon1|на площадь|loc.cpl|к северным воротам|loc.sv",
    "loc.kon1"=>	"Около конюшни|1|войти в конюшню|loc.kon|к Академии|loc.ak1|к банку|loc.bank2",
    "loc.kon"=>		"В конюшне|1|выйти на улицу|loc.kon1",
    "loc.centr1"=>	"Центральная дорога|1|к банку|loc.bank1|войти в таверну|loc.tav|подойти к кузнецу|loc.kuzn|войти в двойное здание|loc.br|на юг|loc.centr2",
    "loc.tav"=>		"Таверна|1|выйти из таверны|loc.centr1|подойти к барной стойке|loc.tav1|в дальний угол|loc.tav2",
    "loc.tav1"=>	"Таверна|1|на второй этаж|loc.tav3|в дальний угол|loc.tav2|к выходу из таверны|loc.tav",
    "loc.tav2"=>	"Таверна|1|на второй этаж|loc.tav3|подойти к барной стойке|loc.tav1|к выходу из таверны|loc.tav",
    "loc.tav3"=>	"Таверна|1|войти в первую дверь|loc.tav4|войти во вторую дверь|loc.tav5|южная лестница на первый этаж|loc.tav1|северная лестница на первый этаж|loc.tav2",
    "loc.tav4"=>	"Таверна|1|выйти в корридор|loc.tav3",
    "loc.tav5"=>	"Таверна|1|выйти в корридор|loc.tav3",
    "loc.br"=>		"Магазин брони|1|выйти на улицу|loc.centr1|перейти в дверь на юге|loc.or",
    "loc.or"=>		"Магазин оружия|1|выйти на улицу|loc.centr2|перейти в дверь на севере|loc.br",
    "loc.centr2"=>	"Центральная улица|1|подойти к кузнецу|loc.kuzn|войти в двойное здание|loc.or|к южным воротам|loc.uv|на север|loc.centr1",
    "loc.kuzn"=>	"Кузница|1|войти в северную дверь|loc.br|войти в южную дверь|loc.or|на север|loc.centr1|на юг|loc.centr2",
    "loc.uv"=>		"Южные ворота|1|на север|loc.centr2|на восток|loc.sklad1|на запад|loc.uz2|выйти за город|loc.pristan",
    "loc.uz2"=>		"Торговый квартал|1|войти в магазин припасов|loc.prip|войти в магазин на юге|loc.luk|на восток к южным воротам|loc.uv|на запад|loc.uz1",
    "loc.prip"=>	"Магазин припасов|1|выйти на улицу|loc.uz2",
    "loc.luk"=>		"Магазин для лучников|1|выйти на улицу|loc.uz2",
    "loc.uz1"=>		"Торговый квартал|1|войти в магазин на севере|loc.jiv|войти в магазин на юге|loc.but|на запад|loc.kaz1|на восток|loc.uz2",
    "loc.jiv"=>		"Магазин Животные|1|выйти на улицу|loc.uz1",
    "loc.but"=>		"Магазин напитков|1|выйти на улицу|loc.uz1",
    "loc.kaz1"=>	"Перед казармами|1|войти в казарму|loc.kaz|к березовой роще|loc.br3|на запад|loc.dv1|на восток|loc.uz1",
    "loc.kaz"=>		"Казармы|1|выйти на улицу|loc.kaz1",
    "loc.dv1"=>		"Около старого дома|1|войти в старый дом|loc.dv|к березовой роще|loc.br3|на восток|loc.kaz1",
    "loc.dv"=>		"Старый дом|0|выйти на улицу|loc.dv1|дверь в углу|loc.dv2",
    "loc.dv2"=>		"Старый дом|0|выйти из комнаты|loc.dv",
    "loc.br3"=>		"Березовая роща|0|к старому дому|loc.dv1|к казармам|loc.kaz1|на запад|loc.br4|на север|loc.br1",
    "loc.br4"=>		"Березовая роща|0|на восток|loc.br3|на север|loc.br2",
    "loc.br2"=>		"Березовая роща|0|на восток|loc.br1|на юг|loc.br4",
    "loc.br1"=>		"Березовая роща|1|к северным воротам|loc.sv|тропинка на запад|loc.br2|тропинка на юг|loc.br3",
    "loc.sv"=>		"Северные ворота|1|выйти из города|loc.zsv|войти в здание|loc.snar|к банку|loc.bank2|к березовой роще|loc.br1",
    "loc.snar"=>	"Магазин снаряжения|1|выйти из здания|loc.sv",
    "loc.zvv"=>		"За восточными воротами|0|войти в город|loc.vv|дорога на север|loc.vd.1|лес на востоке|loc.vl.18",
    "loc.zsv"=>		"За северными воротами|0|войти в город|loc.sv|дорога на север|loc.sd.1|тропинка на запад|loc.zb.1",
    "loc.zb.1"=>	"Западный берег|0|к северным воротам|loc.zsv|лес на север|loc.zl.3|тропа на юг|loc.zb.2",
    "loc.zb.2"=>	"Западный берег|0|тропа на север|loc.zb.1|тропа на юг|loc.zb.3",
    "loc.zb.3"=>	"Западный берег|0|тропа на севере|loc.zb.2|тропа на юг|loc.zb.4",
    "loc.zb.4"=>	"Западный берег|0|тропа на север|loc.zb.3|тропа на восток|loc.zb.5",
    "loc.zb.5"=>	"Западный берег|0|тропа на запад|loc.zb.4|пристань на восток|loc.pristan",
    "loc.pristan"=>	"Пристань|1|войти в город|loc.uv|тропа на запад|loc.zb.5|в порт|loc.port1",
    "loc.port1"=>	"Порт|1|на пристань|loc.pristan|на восток|loc.port2",
    "loc.port2"=>	"Порт|0|в лес на востоке|loc.bl.1|на запад|loc.port1",
    "loc.ak"=>		"Академия|1|выйти на улицу|loc.ak1|войти в магазин|loc.ak4|в библиотеку|loc.ak2|в зал монстрологии|loc.ak5|на второй этаж|loc.ak3",
    "loc.ak4"=>		"Волшебный магазин|1|выйти в парадный зал|loc.ak",
    "loc.ak2"=>		"Библиотека|1|выйти в парадный зал|loc.ak",
    "loc.ak5"=>		"Зал монстрологии|1|выйти в парадный зал|loc.ak",
    "loc.ak3"=>		"Академия|1|спуститься на первый этаж|loc.ak",
    "loc.cpl"=>		"Центральная площадь|1|к банку на север|loc.bank2|к банку на восток|loc.bank1|во двор рыцарей|loc.dvr",
    "loc.dvr"=>		"Двор рыцарей|1|выйти на площадь|loc.cpl|войти в главное здание|loc.dvr4|войти в здание на севере|loc.dvr2|к ристалищу|loc.dvr1",
    "loc.dvr2"=>	"Двор рыцарей|1|выйти во двор|loc.dvr",
    "loc.dvr4"=>	"Двор рыцарей|1|выйти во двор|loc.dvr",
    "loc.dvr1"=>	"Ристалище|1|выйти во двор|loc.dvr|подойти к мечникам|loc.dvr5|подойти к мишеням|loc.dvr3",
    "loc.dvr5"=>	"Ристалище|1|ко входу в ристалище|loc.dvr1|подойти к мишеням|loc.dvr3",
    "loc.dvr3"=>	"Ристалище|1|ко входу в ристалище|loc.dvr1|подойти к мечникам|loc.dvr5",
    "loc.bl.1"=>	"Болотный лес|0|север|loc.bl.3|восток|loc.bl.2|на запад в порт|loc.port2",
    "loc.bl.2"=>	"Болотный лес|0|север|loc.bl.4|восток|loc.vl.1|запад|loc.bl.1",
    "loc.bl.3"=>	"Болотный лес|0|север|loc.bl.5|восток|loc.bl.4|юг|loc.bl.1",
    "loc.bl.4"=>	"Болотный лес|0|север|loc.bl.6|восток|loc.vl.4|юг|loc.bl.2|запад|loc.bl.3",
    "loc.bl.5"=>	"Болотный лес|0|север|loc.bl.7|восток|loc.bl.6|юг|loc.bl.3",
    "loc.bl.6"=>	"Болотный лес|0|север|loc.bl.8|перейти овраг восток|loc.vl.7|юг|loc.bl.4|на запад|loc.bl.5",
    "loc.bl.7"=>	"Болотный лес|0|север|loc.vl.13|восток|loc.bl.8|юг|loc.bl.5",
    "loc.bl.8"=>	"Болотный лес|0|север|loc.vl.14|перейти овраг на восток|loc.vl.10|юг|loc.bl.6|запад|loc.bl.7",
    "loc.kl.1"=>	"Кладбище|0|выйти на дорогу|loc.vd.2|войти в калитку|loc.kl.8|восток|loc.kl.2|запад|loc.kl.15",
    "loc.kl.2"=>	"Кладбище|0|север|loc.kl.7|вдоль ограды на восток|loc.kl.3|к калитке на запад|loc.kl.1",
    "loc.kl.3"=>	"Кладбище|0|войти в усыпальницу|loc.kl.4|вдоль ограды на запад|loc.kl.2|север|loc.kl.6",
    "loc.kl.4"=>	"Кладбище|0|выйти|loc.kl.3",
    "loc.kl.5"=>	"Кладбище|0|запад|loc.kl.6",
    "loc.kl.6"=>	"Кладбище|0|север|loc.kl.24|восток|loc.kl.5|юг|loc.kl.3|запад|loc.kl.7",
    "loc.kl.7"=>	"Кладбище|0|север|loc.kl.23|восток|loc.kl.6|юг|loc.kl.2",
    "loc.kl.8"=>	"Кладбище|0|войти в здание|loc.kl.20|выйти в калитку на юге|loc.kl.1",
    "loc.kl.9"=>	"Кладбище|0|север|loc.kl.19|юг|loc.kl.15|запад|loc.kl.10",
    "loc.kl.10"=>	"Кладбище|0|север|loc.kl.18|восток|loc.kl.9|юг|loc.kl.14",
    "loc.kl.11"=>	"Кладбище|0|вдоль забора на север|loc.kl.16|вдоль забора на юг|loc.kl.12",
    "loc.kl.12"=>	"Кладбище|0|вдоль забора на север|loc.kl.11|вдоль забора на восток|loc.kl.13",
    "loc.kl.13"=>	"Кладбище|0|вдоль забора восток|loc.kl.14|вдоль забора запад|loc.kl.12",
    "loc.kl.14"=>	"Кладбище|0|север|loc.kl.10|восток|loc.kl.15|запад|loc.kl.13",
    "loc.kl.15"=>	"Кладбище|0|север|loc.kl.9|восток|loc.kl.1|запад|loc.kl.14",
    "loc.kl.16"=>	"Кладбище|0|север|loc.kl.33|восток|loc.kl.17|юг|loc.kl.11",
    "loc.kl.17"=>	"Кладбище|0|север|loc.kl.32|восток|loc.kl.18|запад|loc.kl.16",
    "loc.kl.18"=>	"Кладбище|0|север|loc.kl.31|восток|loc.kl.19|юг|loc.kl.10|запад|loc.kl.17",
    "loc.kl.19"=>	"Кладбище|0|север|loc.kl.30|юг|loc.kl.9|запад|loc.kl.18",
    "loc.kl.20"=>	"Кладбище|0|войти в северную дверь|loc.kl.22|войти в восточную дверь|loc.kl.21|выйти на улицу|loc.kl.8",
    "loc.kl.21"=>	"Кладбище|0|выйти|loc.kl.20",
    "loc.kl.22"=>	"Кладбище|0|выйти|loc.kl.20",
    "loc.kl.23"=>	"Кладбище|0|север|loc.kl.28|восток|loc.kl.24|юг|loc.kl.7",
    "loc.kl.24"=>	"Кладбище|0|войти в усыпальницу|loc.kl.25|север|loc.kl.27|юг|loc.kl.6|запад|loc.kl.23",
    "loc.kl.25"=>	"Кладбище|0|выйти на улицу|loc.kl.24",
    "loc.kl.26"=>	"Кладбище|0|запад|loc.kl.27",
    "loc.kl.27"=>	"Кладбище|0|север|loc.kl.42|восток|loc.kl.26|юг|loc.kl.24|запад|loc.kl.28",
    "loc.kl.28"=>	"Кладбище|0|войти в усыпальницу|loc.kl.40|восток|loc.kl.27|юг|loc.kl.23|запад|loc.kl.29",
    "loc.kl.29"=>	"Кладбище|0|север|loc.kl.39|восток|loc.kl.28|запад|loc.kl.30",
    "loc.kl.30"=>	"Кладбище|0|войти в строение|loc.kl.37|восток|loc.kl.29|юг|loc.kl.19|запад|loc.kl.31",
    "loc.kl.31"=>	"Кладбище|0|север|loc.kl.36|восток|loc.kl.30|юг|loc.kl.18|запад|loc.kl.32",
    "loc.kl.32"=>	"Кладбище|0|север|loc.kl.35|восток|loc.kl.31|юг|loc.kl.17|запад|loc.kl.33",
    "loc.kl.33"=>	"Кладбище|0|север|loc.kl.34|восток|loc.kl.32|юг|loc.kl.16",
    "loc.kl.34"=>	"Кладбище|0|вдоль ограды на восток|loc.kl.35|вдоль ограды на юг|loc.kl.33",
    "loc.kl.35"=>	"Кладбище|0|восток|loc.kl.36|юг|loc.kl.32|запад|loc.kl.34",
    "loc.kl.36"=>	"Кладбище|0|юг|loc.kl.31|запад|loc.kl.35",
    "loc.kl.37"=>	"Кладбище|0|войти в дверь|loc.kl.38|выйти на улицу|loc.kl.30",
    "loc.kl.38"=>	"Кладбище|0|выйти|loc.kl.37",
    "loc.kl.39"=>	"Кладбище|0|юг|loc.kl.29",
    "loc.kl.40"=>	"Кладбище|0|войти в дверь|loc.kl.41|выйти на улицу|loc.kl.28",
    "loc.kl.41"=>	"Кладбище|0|выйти|loc.kl.40",
    "loc.kl.42"=>	"Кладбище|0|войти в склеп|loc.kl.43|юг|loc.kl.27",
    "loc.kl.43"=>	"Кладбище|0|выйти на улицу|loc.kl.42",
    "loc.sd.1"=>	"Северная дорога|0|дорога на север|loc.sd.2|к северным воротам|loc.zsv|к озеру на восток|loc.sl.1|лес на западе|loc.zl.1",
    "loc.sd.2"=>	"Северная дорога|0|войти в дом|loc.kzd|дорога на север|loc.sd.3|дорога на юг|loc.sd.1|на запад|loc.zl.10",
    "loc.sd.3"=>	"Северная дорога|0|дорога на север|loc.sd.4|лес на востоке|loc.sl.9|дорога на юг|loc.sd.2|лес на западе|loc.zl.11",
    "loc.sd.4"=>	"Северная дорога|0|дорога на юг|loc.sd.3|лес на западе|loc.zl.12",
    "loc.kzd"=>		"Дом у дороги|0|выйти на улицу|loc.sd.2",
    "loc.sl.1"=>	"Северный лес|0|дорога на севере|loc.sd.1|обогнуть озеро с севера|loc.sl.6|обогнуть озеро с юга|loc.sl.2",
    "loc.sl.2"=>	"Северный лес|0|вдоль берега на восток|loc.sl.3|лес на западе|loc.sl.1",
    "loc.sl.3"=>	"Северный лес|0|вдоль берега на запад|loc.sl.2|на восток|loc.sl.4",
    "loc.sl.4"=>	"Северный лес|0|на дорогу к воротам|loc.vd.1|на северо-восток|loc.vd.2|обогнуть озеро с севера|loc.sl.5|обогнуть озеро с юга|loc.sl.3",
    "loc.sl.5"=>	"Северный лес|0|на север вдоль забора|loc.sl.8|вдоль берега на запад|loc.sl.6|на юго-восток|loc.sl.4",
    "loc.sl.6"=>	"Северный лес|0|в лес на севере|loc.sl.7|вдоль берега на восток|loc.sl.5|на юго-запад|loc.sl.1",
    "loc.sl.7"=>	"Северный лес|0|к озеру|loc.sl.6|север|loc.sl.10|восток|loc.sl.8",
    "loc.sl.8"=>	"Северный лес|0|на юг к озеру|loc.sl.5|север|loc.sl.11|запад|loc.sl.7",
    "loc.sl.9"=>	"Северный лес|0|дорога на западе|loc.sd.3|на восток|loc.sl.10",
    "loc.sl.10"=>	"Северный лес|0|восток|loc.sl.11|юг|loc.sl.7|запад|loc.sl.9",
    "loc.sl.11"=>	"Северный лес|0|восток|loc.sl.12|юг|loc.sl.8|запад|loc.sl.10",
    "loc.sl.12"=>	"Северный лес|0|восток|loc.sl.14|запад|loc.sl.11",
    "loc.sl.14"=>	"Северный лес|0|восток|loc.sl.15|запад|loc.sl.12",
    "loc.sl.15"=>	"Северный лес|0|дорога на востоке|loc.vd.7|вдоль кладбища на юг|loc.sl.16|вдоль кладбища на запад|loc.sl.14",
    "loc.sl.16"=>	"Северный лес|0|дорога на востоке|loc.vd.6|на север|loc.sl.15|на юг|loc.sl.17",
    "loc.sl.17"=>	"Северный лес|0|дорога на востоке|loc.vd.5|дорога на юге|loc.vd.4|на север|loc.sl.16",
    "loc.vd.1"=>	"Восточная дорога|0|дорога на севере|loc.vd.2|лес на востоке|loc.vl.23|ворота на юге|loc.zvv|к озеру на западе|loc.sl.4",
    "loc.vd.2"=>	"Восточная дорога|0|войти в калитку|loc.kl.1|по дороге на восток|loc.vd.3|по дороге на юг|loc.vd.1|на запад|loc.sl.4|в лес на юге|loc.vl.23",
    "loc.vd.3"=>	"Восточная дорога|0|дорога на восток|loc.vd.4|лес на юге|loc.vl.24|дорога на запад|loc.vd.2",
    "loc.vd.4"=>	"Восточная дорога|0|север|loc.sl.17|дорога на восток|loc.vd.5|юг|loc.vl.25|дорога на запад|loc.vd.3",
    "loc.vd.5"=>	"Восточная дорога|0|дорога на север|loc.vd.6|восток|loc.vl.28|дорога на юг|loc.vd.4|запад|loc.sl.17",
    "loc.vd.6"=>	"Восточная дорога|0|дорога на север|loc.vd.7|восток|loc.vl.29|дорога на юг|loc.vd.5|запад|loc.sl.16",
    "loc.vd.7"=>	"Восточная дорога|0|восток|loc.vl.30|дорога на юг|loc.vd.6|запад|loc.sl.15",
    "loc.vl.1"=>	"Восточный лес|0|север|loc.vl.4|восток|loc.vl.2|запад|loc.bl.2",
    "loc.vl.2"=>	"Восточный лес|0|север|loc.vl.5|восток|loc.vl.3|запад|loc.vl.1",
    "loc.vl.3"=>	"Восточный лес|0|север|loc.vl.6|запад|loc.vl.2",
    "loc.vl.4"=>	"Восточный лес|0|север|loc.vl.7|восток|loc.vl.5|юг|loc.vl.1|запад|loc.bl.4",
    "loc.vl.5"=>	"Восточный лес|0|север|loc.vl.8|восток|loc.vl.6|юг|loc.vl.2|запад|loc.vl.4",
    "loc.vl.6"=>	"Восточный лес|0|север|loc.vl.9|юг|loc.vl.3|запад|loc.vl.5",
    "loc.vl.7"=>	"Восточный лес|0|север|loc.vl.10|восток|loc.vl.8|юг|loc.vl.4|перейти овраг на запад|loc.bl.6",
    "loc.vl.8"=>	"Восточный лес|0|север|loc.vl.11|восток|loc.vl.9|юг|loc.vl.5|запад|loc.vl.7",
    "loc.vl.9"=>	"Восточный лес|0|север|loc.vl.12|юг|loc.vl.6|запад|loc.vl.8",
    "loc.vl.10"=>	"Восточный лес|0|север|loc.vl.15|восток|loc.vl.11|юг|loc.vl.7|перейти овраг на запад|loc.bl.8",
    "loc.vl.11"=>	"Восточный лес|0|север|loc.vl.16|восток|loc.vl.12|юг|loc.vl.8|запад|loc.vl.10",
    "loc.vl.12"=>	"Восточный лес|0|север|loc.vl.17|юг|loc.vl.9|запад|loc.vl.11",
    "loc.vl.13"=>	"Восточный лес|0|север|loc.vl.18|восток|loc.vl.14|юг|loc.bl.7",
    "loc.vl.14"=>	"Восточный лес|0|север|loc.vl.19|восток|loc.vl.15|юг|loc.bl.8|запад|loc.vl.13",
    "loc.vl.15"=>	"Восточный лес|0|север|loc.vl.20|восток|loc.vl.16|юг|loc.vl.10|запад|loc.vl.14",
    "loc.vl.16"=>	"Восточный лес|0|север|loc.vl.21|восток|loc.vl.17|юг|loc.vl.11|запад|loc.vl.15",
    "loc.vl.17"=>	"Восточный лес|0|север|loc.vl.22|юг|loc.vl.12|запад|loc.vl.16",
    "loc.vl.18"=>	"Восточный лес|0|север|loc.vl.23|восток|loc.vl.19|юг|loc.vl.13|на дорогу|loc.zvv",
    "loc.vl.19"=>	"Восточный лес|0|север|loc.vl.24|восток|loc.vl.20|юг|loc.vl.14|запад|loc.vl.18",
    "loc.vl.20"=>	"Восточный лес|0|север|loc.vl.25|восток|loc.vl.21|юг|loc.vl.15|запад|loc.vl.19",
    "loc.vl.21"=>	"Восточный лес|0|север|loc.vl.26|восток|loc.vl.22|юг|loc.vl.16|запад|loc.vl.20",
    "loc.vl.22"=>	"Восточный лес|0|север|loc.vl.27|юг|loc.vl.17|запад|loc.vl.21",
    "loc.vl.23"=>	"Восточный лес|0|север|loc.vd.2|восток|loc.vl.24|юг|loc.vl.18|запад|loc.vd.1",
    "loc.vl.24"=>	"Восточный лес|0|север|loc.vd.3|восток|loc.vl.25|юг|loc.vl.19|запад|loc.vl.23",
    "loc.vl.25"=>	"Восточный лес|0|север|loc.vd.4|восток|loc.vl.26|юг|loc.vl.20|запад|loc.vl.24",
    "loc.vl.26"=>	"Восточный лес|0|север|loc.vl.28|восток|loc.vl.27|юг|loc.vl.21|запад|loc.vl.25",
    "loc.vl.27"=>	"Восточный лес|0|север|loc.vl.28|юг|loc.vl.22|запад|loc.vl.26",
    "loc.vl.28"=>	"Восточный лес|0|север|loc.vl.29|юг|loc.vl.26|юго-восток|loc.vl.27|запад|loc.vd.5",
    "loc.vl.29"=>	"Восточный лес|0|север|loc.vl.30|юг|loc.vl.28|запад|loc.vd.6",
    "loc.vl.30"=>	"Восточный лес|0|юг|loc.vl.29|на дорогу|loc.vd.7",
    "loc.zl.1"=>	"Западный лес|0|к северным воротам|loc.sd.1|север|loc.zl.10|запад|loc.zl.2",
    "loc.zl.2"=>	"Западный лес|0|север|loc.zl.9|восток|loc.zl.1|запад|loc.zl.3",
    "loc.zl.3"=>	"Западный лес|0|на тропу на юге|loc.zb.1|вдоль реки на запад|loc.zl.4|север|loc.zl.8|восток|loc.zl.2",
    "loc.zl.4"=>	"Западный лес|0|вдоль реки на восток|loc.zl.3|вдоль реки на запад|loc.zl.5|север|loc.zl.7",
    "loc.zl.5"=>	"Западный лес|0|вдоль реки на восток|loc.zl.4|на север|loc.zl.6",
    "loc.zl.6"=>	"Западный лес|0|север|loc.zl.15|восток|loc.zl.7|юг|loc.zl.5",
    "loc.zl.7"=>	"Западный лес|0|север|loc.zl.14|запад|loc.zl.6|юг|loc.zl.4|восток|loc.zl.8",
    "loc.zl.8"=>	"Западный лес|0|север|loc.zl.13|восток|loc.zl.9|юг|loc.zl.3|запад|loc.zl.7",
    "loc.zl.9"=>	"Западный лес|0|север|loc.zl.12|восток|loc.zl.10|юг|loc.zl.2|запад|loc.zl.8",
    "loc.zl.10"=>	"Западный лес|0|дорога на востоке|loc.sd.2|север|loc.zl.11|юг|loc.zl.1|запад|loc.zl.9",
    "loc.zl.11"=>	"Западный лес|0|дорога на востоке|loc.sd.3|на северо-запад|loc.zl.12|вдоль дороги на юг|loc.zl.10",
    "loc.zl.12"=>	"Западный лес|0|дорога на востоке|loc.sd.4|на юго-восток|loc.zl.11|юг|loc.zl.9|запад|loc.zl.13",
    "loc.zl.13"=>	"Западный лес|0|войти в дом|loc.krestd|восток|loc.zl.12|юг|loc.zl.8|запад|loc.zl.14",
    "loc.zl.14"=>	"Западный лес|0|восток|loc.zl.13|юг|loc.zl.7|запад|loc.zl.15",
    "loc.zl.15"=>	"Западный лес|0|восток|loc.zl.14|юг|loc.zl.6",
    "loc.krestd"=>	"Крестьянский дом|0|выйти на улицу|loc.zl.13",
];