<?php
namespace neko\catcore;
use pocketmine\Player;
use pocketmine\scheduler\PluginTask;
use pocketmine\Server;
class BroadcastPluginTask extends PluginTask{
	public function onRun($currentTick){
		if($currentTick<=250){
		Server::getInstance()->broadcastMessage("§0[§9NekoCraft§0]§f§l Version: Neko4.5.0Alpha Made by NekoGirl678!");
		}
		//set auto poster TODO
		
	}
}
