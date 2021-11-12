<?php

namespace Ping;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;

class Main extends PluginBase implements Listener {
    
    public function onEnable(){
        $this->getLogger()->info("Plugin Enable By AxelFeL");
    }
    
    public function getPing(Player $player){
        $ping = $player->getPlayer()->getPing();
        $player->sendMessage("§aYour Currently Ping Now Is : " . $ping . " ms");
    }
    
    public function onCommand(CommandSender $sender, Command $cmd, String $label, array $args) : bool {
        switch($cmd->getName()){
            case "ping":
                if($sender instanceof Player){
                    $this->getPing($sender);
                } else {
                    $sender->sendMessage("Only Work In Game");
                }
        }
    return true;
    }
}
