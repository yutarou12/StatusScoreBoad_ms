<?php

namespace status;

use pocketmine\Server;

use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\Listener;

use pocketmine\scheduler\Task;

use pocketmine\plugin\PluginBase;

use Saisana299\easyscoreboardapi\EasyScoreboardAPI;
use metowa1227\moneysystem\api\core\API;

use status\Task\scoreTask;

class Main extends PluginBase implements Listener{

	public function onEnable(){ 
		date_default_timezone_set('Asia/Tokyo');

       $this->getServer()->getPluginManager()->registerEvents($this,$this);
           $this->getScheduler()->scheduleRepeatingTask(new scoreTask($this), 5);

		$this->getLogger()->notice("StatusScoreBoard[MS版]を読み込みました。by  yutarou1241477");
		$this->api = $this->getServer()->getPluginManager()->getPlugin("MoneySystem");
        if($this->api == null){
		$this->getLogger()->error("MoneySystemが見つかりません。サーバーを停止します。");
		$this->getServer()->shutdown();
		}else{
		$this->getLogger()->info("MoneySystemを確認しました。");
		}

		$this->api = $this->getServer()->getPluginManager()->getPlugin("EasyScoreboardAPI");
        if($this->api == null){
		$this->getLogger()->error("EasyScoreboardAPIが見つかりません。サーバーを停止します。");
		$this->getServer()->shutdown();
		}else{
		$this->getLogger()->info("EasyScoreboardAPIを確認しました。");
		}
    }
}

