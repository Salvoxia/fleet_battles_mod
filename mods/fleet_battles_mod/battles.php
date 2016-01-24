<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'class.battles.php');

$page = new Page('Battles');

// add filter toggling script
$jsDir = config::get("cfg_kbhost") . '/mods/' . basename(dirname(__FILE__)) . '/js/';
$page->addHeader("<script type=\"text/javascript\" src=\"".$jsDir."toggleFilter.js\"></script>");

switch ($_GET['view'])
{
    case '':
	echo "<!-- MOD VERSION -->\n";
        $battlelist = new BattleList();
        $page->setTitle('Fleet Battles');
	
        $table = new BattleListTable($battlelist);

        // pagination only available for cached battles and non-filtered results
        if (config::get('fleet_battles_mod_cache') && !isset($_POST["filter"]))
        {
            $table->setPageSplit(config::get('killcount')*2);
            $pagesplitter = new PageSplitter($table->getCount(),
                            config::get('killcount')*2);
            $pagesplit = $pagesplitter->generate();
            
            $html .= $pagesplit.$table->generate().$pagesplit.$table->getStatsHtml();
        }
        
        else
        {
            $html .= $table->generate().$table->getStatsHtml();  
        }       
        break;
}

$menubox = new box('Menu');
$menubox->setIcon('menu-item.gif');
$menubox->addOption('link', 'Fleet Battles', edkURI::page('battles'));

$page->addContext($menubox->generate());

$page->setContent($html);
$page->generate();
?>
