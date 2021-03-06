<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 09.12.2015
 * Time: 21:50
 */

$lang = [
    "class" => [
        "war" => "воин",
        "mag" => "маг",
        "ass" => "убийца"
    ],
    "spl" => [
        "war_sword_shield"  => "страж",
        "war_dual_sword"    => "воин",
        "war_mace"          => "палладин",
        "war_spear"         => "рыцарь",
        "war_axe"           => "берсерк"
    ],
    "char_params" => [
        "жизнь", "макс. жизнь", "мана", "макс. мана"
    ],
    "base_params" => [
        "сила", "ловкость", "интеллект", "конституция", "выносливость", "харизма"
    ],
    "war_skills" => [
        "рукопашный бой",
        "мечи",
        "луки",
        "парные клинки",
        "древковое оружие",
        "дробящее оружие",
        "топоры",
        "волшебство",
        "магия огня",
        "магия воды",
        "магия земли",
        "магия воздуха",
        "физ. уклон",
        "физ. паррирование",
        "маг. уклон",
        "маг. паррирование",
        "сопротивление магии"
    ],
    "war_stats" => [
        "точность",
        "точность магии",
        "мин. урон",
        "макс. урон",
        "отдых после атаки",
        "броня",
        "щит",
        "физ. уклон",
        "маг. уклон",
        "физ. паррирование",
        "маг. паррирование",
        "сопротивление магии",
        "физ. крит",
        "маг. крит"
    ],
    "info" => [
        "base_params" => [
            "Влияет на силу нанесенного вами удара. Чем выше сила, тем больше урона вы нанесете (по 1 единице урона за каждую единицу силы), а также на вероятность успешного парирования удара (2% за каждую единицу).",
            "Пожалуй, самый универсальный параметр. Влияет на уворот (2% за каждую вложенную единицу, но не более 5 единиц), точность удара (от 2 до 8% за каждую вложенную единицу, но не более 5 единиц), шанс нанесения критического удара (1% за единицу, но не более 5 единиц. У следопытов и лучников по 2% за единицу, но не более 6 единиц), скорость персонажа. (5 единиц ловкости уменьшают отдых на 1 секунду.)",
            "Влияет на уровень маны (1 вложенное очко дает 10 единиц маны), а также на шанс удачного произнесения заклинания (2% успеха за каждую вложенную единицу, но не более 6 единиц), на уклонение от магии (1% уклонения за единицу, но не более 5%) и магическое парирование (2% парирования, но не более 10%).",
            "Показатель влияет на уровень здоровья персонажа и уклон, 1 вложенное очко дает 10 единиц жизни и отнимает 0.5% уклона. ",
            "Влияет на скорость восстановления вашего здоровья. При уровне выносливости 60 вы восстанавливаете 1 единицу здоровья в секунду.",
            "Влияет на уровень маны, а также на скорость ее восстановления. При уровне харизмы 60 вы восстанавливаете 1 единицу маны в секунду."
        ],
        "war_skills" => [
            "Влияет на точность при рукопашном бое, а также на урон в рукопашном бою. \nДает по 10% точности за вложенную единицу.",
            "Влияет на точность при бое с мечем, причем неважно одноручным, или двуручным. \nДает по 10% точности за вложенную единицу, а также 1% к парированию и магическому парированию.",
            "Влияет на точность при бое с луком. \nДает по 12% точности за вложенную единицу для боя на коротких дистанциях и по 6% точности для боя на удаленных дистанциях. Более того, вы получаете 1% к уклону за каждое вложенное очко навыка.",
            "Влияет на точность при бое с парными мечами, парными кинжалами. \nДает по 10% точности за вложенную единицу, а также 1% к критическому урону.",
            "Влияет на точность при бое с алебардами, пиками, копьями. \nДает по 10+1% точности за вложенную единицу.",
            "Влияет на точность при бое с молотами, дубинами. \nДает по 10% точности за вложенную единицу. При максимальном изучении дает +5% к парированию.",
            "Влияет на точность при бое с топорами. \nДает по 10% точности за вложенную единицу. При максимальном изучении дает +5% к парированию",
            "Влияет на успешный шанс произнесения волшебных заклинаний.\nДает 10% шанс удачного произнесения заклинания за одну единицу навыка. При изучении навыка на максимальный уровень дает +1% к магическому уклону.",
            "Влияет на успешный шанс произнесения заклинаний стихии огня.\nДает 10% шанс удачного произнесения заклинания за одну единицу навыка. При изучении навыка на максимальный уровень дает +1% к рассеиванию магии.",
            "Влияет на успешный шанс произнесения заклинаний стихии воды.\nДает 10% шанс удачного произнесения заклинания за одну единицу навыка. При изучении навыка на максимальный уровень дает +1% к магическому паррированию.",
            "Влияет на успешный шанс произнесения заклинаний стихии земли.\nДает 10% шанс удачного произнесения заклинания за одну единицу навыка. При изучении навыка на максимальный уровень дает +1% к рассеиванию магии.",
            "Влияет на успешный шанс произнесения заклинаний стихии воздуха.\nДает 10% шанс удачного произнесения заклинания за одну единицу навыка. При изучении навыка на максимальный уровень дает +1% к магическому уклону.",
            "Влияет на успешный уворот от физической атаки противника. 1 вложенное очко дает 5% уклона.",
            "Влияет на шанс парирования физической атаки противника щитом или другим друручным оружием. 1 вложенное очко дает 5% парирования.",
            "Влияет на успешный уворот от магической атаки противника. 1 вложеное очко дает 5% магического уклона.",
            "Влияет на шанс укрыться от магической атаки противника щитом. 1 вложенное очко дает 5% шанс парирования атаки.",
            "Показатель \"поглощаемого\" персонажем магического урона. Магические атаки противника снижаются. 1 вложенное очко уменьшает получаемый урон от магических атак на 2%."
        ],
        "war_stats" => [
            "Базовая вероятность попадания по противнику.",
            "Базовый урон от оружия.",
            "Сумма брони персонажа - уменьшает наносимый по вам урон.",
            "При успешном парировании поглощает это количество урона.",
            "Базовая вероятность успешного чтения заклинания."
        ],
    ],
    "equip" => [
        "head" => "шлем",
        "bodyarm" => "доспех",
        "leg" => "поножи",
        "shoes" => "сапоги",
        "rhand" => "первая рука",
        "lhand" => "вторая рука",
        "gloves" => "перчатки",
        "cloack" => "плащ",
        "hand" => "поручи"
    ],
    "item_types" => [
        "sword" => "меч",
        "dual_sword" => "двуручный меч",
        "pair_knife" => "парные клинки",
        "pair_swords" => "парные мечи",
        "bow" => "лук",
        "axe" => "топор",
        "dual_axe" => "двуручный топор",
        "spear" => "копье",
        "mace" => "булава",
        "dual_mace" => "двуручная булава",
        "book" => "книга",
        "bodyarm" => "доспехи",
        "helmet" => "шлем",
        "hand" => "поручи",
        "leg" => "поножи",
        "robe" => "роба",
        "ring" => "кольцо",
        "brace" => "браслет",
        "amulet" => "амулет",
        "shoes" => "сапоги",
        "gloves" => "перчатки",
        "cloak" => "плащ",
        "set" => "вспомогательный предмет",
        "misc" => "прочее",
        "quest" => "квестовый предмет",
        "plugin" => "плагин",
        "bottle" => "эликсир",
        "gem" => "самоцвет",
        "wagon" => "повозка"
    ],
    "npc_prof" => [
        "gid" => "гид",
        "bankir" => "банкир",
        "trader" => "торговец",
        "healer" => "лекарь",
        "def" => "житель"
    ],
    "msgs" => [
        "move" => "[1/] [2:{ушел|ушла|пришел|пришла}/] [3/]"
    ]
];