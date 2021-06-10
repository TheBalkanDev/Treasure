<?php

namespace TheBalkanDev;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\Server;
use pockermine\utils\Utils;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\level\sound\PopSound;
use pocketmine\level\particle\LavaParticle;
use pocketmine\item\Item;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this,$this);
		$this->saveDefaultConfig();
		
		$this->getServer()->getLogger()->info(TextFormat::GREEN."[Treasure] is now on!");
	}

	public function onBreak(BlockBreakEvent $e){
		$p = $e->getPlayer();
		$b = $e->getBlock();
		if($e->getBlock()->getId() == 1 && mt_rand(0,$this->getConfig()->get("lvl1-chance")) == "1"){
			for($i = 0; $i <= 5; $i++){
		        $p->getLevel()->addParticle(new LavaParticle($b, 2));
			$p->addSound(new PopSound($p));
			$p->sendMessage($this->getConfig()->get("lvl1-message"));
			foreach($this->getConfig()->get("lvl1-loot") as $loot){
				$p->getInventory()->addItem(Item::get($loot,0,mt_rand(0,$this->getConfig()->get("lvl1-item-max"))));
			}
		}
		if($e->getBlock()->getId() == 1 && mt_rand(0,$this->getConfig()->get("lvl2-chance")) == "1"){
			for($i = 0; $i <= 8; $i++){
		        $p->getLevel()->addParticle(new LavaParticle($b, 2));
			$p->addSound(new PopSound($p));
			$p->sendMessage($this->getConfig()->get("lvl2-message"));
			foreach($this->getConfig()->get("lvl2-loot") as $loot){
				$p->getInventory()->addItem(Item::get($loot,0,mt_rand(0,$this->getConfig()->get("lvl2-item-max"))));
			}
		}
		if($e->getBlock()->getId() == 1 && mt_rand(0,$this->getConfig()->get("lvl3-chance")) == "1"){
			for($i = 0; $i <= 11; $i++){
		        $p->getLevel()->addParticle(new LavaParticle($b, 2));
			$p->addSound(new PopSound($p));
			$p->sendMessage($this->getConfig()->get("lvl3-message"));
			foreach($this->getConfig()->get("lvl3-loot") as $loot){
				$p->getInventory()->addItem(Item::get($loot,0,mt_rand(0,$this->getConfig()->get("lvl3-item-max"))));
			}
		}
	}
} 
