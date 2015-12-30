<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 03.12.2015
 * Time: 20:21
 */


function addNpc($nId)
{
    if (file_exists(ROOT . "/../data/npc/" . $nId . ".php")) {
        $npc = require ROOT . "/../data/npc/" . $nId . ".php";
    } else {
        throw new Exception("Npc $nId not found");
    }
    return $npc;
}

function addItem($iId)
{
    global $ld;
    $itemCollection = $ld->items;
    if ($item = $itemCollection->findOne(["iid" => $iId])) {
        return $item;
    }
    throw new Exception("Npc $iId not found");
}

$locations = [
    [
        "lid" => "ld.950.250",
        "title" => "Разрушеная деревня Арчеров. Эшафот.",
        "global" => "Долина Фаиль",
        "messages" => [
            "Это разрушенная деревня Арчеров. Вы стоите перед эшафотом, где недавно вас чуть было не казнили, перед вам труп Фасилнуира, человека, который хотел вас казнить",
        ],
        "doors" => [
            ["к выходу на юге", "ld.950.260"],
            ["к выходу на севере", "ld.950.240"],
            ["к выходу на востоке", "ld.960.250"],
            ["к выходу на западе", "ld.940.250"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_UNGUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "ld.950.240",
        "title" => "Северный выход из деревни.",
        "global" => "Долина Фаиль",
        "messages" => [
            "Северный выход из деревни забаррикадирован",
        ],
        "doors" => [
            ["к эшафоту", "ld.950.250"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_UNGUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "ld.950.260",
        "title" => "Южный выход из деревни.",
        "global" => "Долина Фаиль",
        "messages" => [
            "Чудо, здесь осталась повозка с лошадью, я должен скорее ехать в безопасное место.",
        ],
        "doors" => [
            ["к эшафоту", "ld.950.250"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_UNGUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "ld.940.250",
        "title" => "Западный выход из деревни",
        "global" => "Долина Фаиль",
        "messages" => [
            "Западный выход из деревни забаррикадирован",
        ],
        "doors" => [
            ["к эшафоту", "ld.950.250"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_UNGUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "ld.960.250",
        "title" => "Восточный выход из деревни",
        "global" => "Долина Фаиль",
        "messages" => [
            "Восточный выход из деревни забаррикадирован",
        ],
        "doors" => [
            ["к эшафоту", "ld.950.250"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_UNGUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "ld.790.1370",
        "title" => "У северных ворот города Фаиль",
        "global" => "Долина Фаиль",
        "doors" => [
            ["на север по долине", "ld.790.1360"],
            ["войти в город", "fail.ngate"]
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_UNGUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.ngate",
        "title" => "Северные ворота",
        "global" => "Фаиль",
        "doors" => [
            ["выйти за ворота", "ld.790.1370"],
            ["к банку", "fail.bank2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.bank2",
        "title" => "У банка",
        "global" => "Фаиль",
        "doors" => [
            ["войти в банк", "fail.bank"],
            ["к северным воротам", "fail.ngate"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.bank",
        "title" => "Банк",
        "global" => "Фаиль",
        "doors" => [
            ["в восточную дверь", "fail.bank2"],
            ["в западную дверь", "fail.bank3"],
            ["в южную дверь", "fail.cpl"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_BUILD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.bank3",
        "title" => "Возле банка",
        "global" => "Фаиль",
        "doors" => [
            ["в банк", "fail.bank"],
            ["в конюшню", "fail.kon"],
            ["на центральный перекресток", "fail.per1"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.kon",
        "title" => "Конюшня",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.bank3"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.per1",
        "title" => "Центральный перекресток",
        "global" => "Фаиль",
        "doors" => [
            ["к банку", "fail.bank3"],
            ["в академию", "fail.ak"],
            ["к дом лекаря", "fail.lek"],
            ["на центральную улицу", "fail.centr0"],
            ["в жилой квартал", "fail.wgate1"]
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.ak",
        "title" => "Академия магии",
        "global" => "Фаиль",
        "doors" => [
            ["ко входу", "fail.per1"],
            ["на второй этаж", "fail.ak2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_BUILD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.ak2",
        "title" => "Академия магии",
        "global" => "Фаиль",
        "doors" => [
            ["на первый этаж", "fail.ak"],
            ["в библиотеку", "fail.bibl"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.bibl",
        "title" => "Библиотека академии",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.ak2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.lek",
        "title" => "Дом лекаря",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.per1"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_BUILD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.wgate1",
        "title" => "Жилой квартал",
        "global" => "Фаиль",
        "doors" => [
            ["к перекрестку", "fail.per1"],
            ["к западным воротам", "fail.wgate"],
            ["на юго-восток, к складу", "fail.zkv1"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.zkv1",
        "title" => "Жилой квартал",
        "global" => "Фаиль",
        "doors" => [
            ["к складу", "fail.sklad"],
            ["на северо-запад, к воротам", "fail.wgate1"],
            ["на запад по кварталу", "fail.zkv2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.sklad",
        "title" => "Возле склада",
        "global" => "Фаиль",
        "doors" => [
            ["в склад", "fail.sklad2"],
            ["в жилой квартал, на север", "fail.zkv1"],
            ["к южным воротам", "fail.sgate"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.sklad2",
        "title" => "Внутри склада",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.sklad"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_UNGUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.zkv2",
        "title" => "Жилой квартал",
        "global" => "Фаиль",
        "doors" => [
            ["на восток", "fail.zkv1"],
            ["на запад", "fail.zkv3"],
            ["в дом на юге", "fail.zkv4"]
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.zkv4",
        "title" => "Дом торговца",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.zkv2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_BUILD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.zkv3",
        "title" => "Жилой квартал",
        "global" => "Фаиль",
        "doors" => [
            ["в дом на юге", "fail.zkv5"],
            ["на восток", "fail.zkv2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.zkv5",
        "title" => "Жилой дом",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.zkv3"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_BUILD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.centr1",
        "title" => "Центральная улица",
        "global" => "Фаиль",
        "doors" => [
            ["к южным воротам", "fail.sgate"],
            ["по улице на север", "fail.centr0"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.centr0",
        "title" => "Центральная улица",
        "global" => "Фаиль",
        "doors" => [
            ["к перекрестку на северо-запад", "fail.per1"],
            ["на центральную площадь", "fail.cpl"],
            ["по улице на юг", "fail.centr1"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.sgate",
        "title" => "Южные ворота",
        "global" => "Фаиль",
        "doors" => [
            ["по центральной улице на север", "fail.centr1"],
            ["к складу", "fail.sklad"],
            ["на восток в рабочий квартал", "fail.rab1"],
            ["выйти из города", "fail.sgate"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.rab1",
        "title" => "Рабочий квартал",
        "global" => "Фаиль",
        "doors" => [
            ["на юго-восток по кварталу", "fail.rab3"],
            ["на северо-восток по кварталу", "fail.rab2"],
            ["к южным воротам", "fail.sgate"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.rab2",
        "title" => "Рабочий квартал",
        "global" => "Фаиль",
        "doors" => [
            ["на север по кварталу", "fail.rab4"],
            ["в кузницу", "fail.kuzn"],
            ["на юго-запад по кварталу", "fail.rab1"],
            ["на восток, в сторону ворот", "fail.vul1"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.rab4",
        "title" => "Рабочий квартал",
        "global" => "Фаиль",
        "doors" => [
            ["на центральную площадь", "fail.cpl"],
            ["в таверну", "fail.tavern"],
            ["на юго по кварталу", "fail.rab2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.kuzn",
        "title" => "Кузница",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.rab2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_BUILD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.tavern",
        "title" => "Таверна",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.rab4"],
            ["на второй этаж", "fail.tavern2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.tavern2",
        "title" => "Таверна. Второй этаж",
        "global" => "Фаиль",
        "doors" => [
            ["на первый этаж", "fail.tavern"],
            ["в комнату справа", "fail.tavern3"],
            ["в комнату слева", "fail.tavern4"],
            ["в дальнюю комнату", "fail.tavern5"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.tavern3",
        "title" => "Таверна. Комната слева.",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.tavern2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_BUILD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.tavern4",
        "title" => "Таверна. Комната справа.",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.tavern2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_BUILD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.tavern5",
        "title" => "Таверна. Дальняя комната.",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.tavern2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_BUILD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.cpl",
        "title" => "Центральная площадь",
        "global" => "Фаиль",
        "doors" => [
            ["в банк", "fail.bank"],
            ["на центральную улицу", "fail.centr0"],
            ["в рабочий квартал", "fail.rab4"],
            ["во двор рыцарей", "fail.dvor"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.dvor",
        "title" => "Двор рыцарей",
        "global" => "Фаиль",
        "doors" => [
            ["на площадь", "fail.cpl"],
            ["во внутренниц двор", "fail.dvor1"],
            ["в главное здание", "fail.dvor5"],
            ["в мэрию", "fail.dvor6"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.dvor5",
        "title" => "Главное здание",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.dvor"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_BUILD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.dvor6",
        "title" => "Мэрия",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.dvor"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_BUILD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.dvor1",
        "title" => "Внутренниц двор",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.dvor"],
            ["к ассасинам", "fail.dvor2"],
            ["в рыцарям", "fail.dvor3"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.dvor2",
        "title" => "Место тренировки ассасинов",
        "global" => "Фаиль",
        "doors" => [
            ["во внутренний двор", "fail.dvor1"],
            ["к рыцарям", "fail.dvor3"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.dvor3",
        "title" => "Место тренировки рыцарей",
        "global" => "Фаиль",
        "doors" => [
            ["во внутренний двор", "fail.dvor1"],
            ["к ассасинам", "fail.dvor2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.vul1",
        "title" => "Восточная улица",
        "global" => "Фаиль",
        "doors" => [
            ["по улице на восток", "fail.vul2"],
            ["в рабочий квартал", "fail.rab2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.vul2",
        "title" => "Восточная улица",
        "global" => "Фаиль",
        "doors" => [
            ["по улице на северо-восток", "fail.vul3"],
            ["по улице на запад", "fail.vul1"],
            ["в дом на юго-востоке", "fail.vdom1"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.vdom1",
        "title" => "Старый дом",
        "global" => "Фаиль",
        "doors" => [
            ["на улицу", "fail.vul2"],
            ["в дальний угол", "fail.vdom2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_BUILD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.vdom2",
        "title" => "Старый дом",
        "global" => "Фаиль",
        "doors" => [
            ["к выходу", "fail.vdom1"],
            ["на второй этаж", "fail.vdom3"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.vdom3",
        "title" => "Старый дом. Второй этаж.",
        "global" => "Фаиль",
        "doors" => [
            ["на первый этаж", "fail.vdom2"],
            ["в дальнюю комнату", "fail.vdom4"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_UNGUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.vdom4",
        "title" => "Старый дом. Дальняя комната.",
        "global" => "Фаиль",
        "doors" => [
            ["в корридор", "fail.vdom3"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_UNGUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.vul3",
        "title" => "Восточная улица.",
        "global" => "Фаиль",
        "doors" => [
            ["по улице на юго-запад", "fail.vul2"],
            ["к восточным воротам", "fail.egate"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.egate",
        "title" => "Восточные ворота.",
        "global" => "Фаиль",
        "doors" => [
            ["выйти из города", "fail.vul3"],
            ["по улице на юг", "fail.vul3"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.rab3",
        "title" => "Рабочий квартал",
        "global" => "Фаиль",
        "doors" => [
            ["по кварталу на северо-запад", "fail.rab2"],
            ["в торговый переулок на восток", "fail.torg1"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.torg1",
        "title" => "Торговый переулок",
        "global" => "Фаиль",
        "doors" => [
            ["на восток по переулку", "fail.torg2"],
            ["в рабочий квартал на запад", "fail.rab3"],
            ["в магазин 1000 мелочей", "fail.shop1"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.torg2",
        "title" => "Торговый переулок",
        "global" => "Фаиль",
        "doors" => [
            ["на запад по переулку", "fail.torg1"],
            ["в магазин напитков", "fail.shop2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.shop1",
        "title" => "Магазин \"1000\" мелочей",
        "global" => "Фаиль",
        "doors" => [
            ["в торговый переулок", "fail.torg1"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.shop2",
        "title" => "Магазин напитков",
        "global" => "Фаиль",
        "doors" => [
            ["в торговый переулок", "fail.torg2"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
    [
        "lid" => "fail.wgate",
        "title" => "Западные ворота",
        "global" => "Фаиль",
        "doors" => [
            ["назад", "fail.wgate1"],
        ],
        "terr" => \Likedimion\Helper\LocationHelper::TERRITORY_GUARD,
        "loc" => [],
        "loc_add" => [],
        "loc_t" => []
    ],
];




