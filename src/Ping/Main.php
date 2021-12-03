<?php

namespace Ping;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase {
    
    public function onEnable(): void {
        $this->getLogger()->info("[PP] Plugin Enabled!");
    }
    
    public function getPing(Player $player){
        $ping = $player->getNetworkSession()->getPing();
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
            break;
        }
    return true;
    }
}
