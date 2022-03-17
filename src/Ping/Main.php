<?php

namespace Ping;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase {
    
    public function onEnable() : void {
        $this->getLogger()->info("Plugin PingPlayer Enabled By AxelFeL!");
    }
    
    public function getPing($player, Player $target){
        $ping = $target->getNetworkSession()->getPing();
        if($player !== $target){
            $player->sendMessage("§a".$target->getName()." Currently Ping Now Is : " . $ping . " ms");
        } else {
            $player->sendMessage("§aYour Currently Ping Now Is : " . $ping . " ms");
        }
    }
    
    public function onCommand(CommandSender $sender, Command $cmd, String $label, array $args) : bool {
        $argg = array_shift($args);
        switch($cmd->getName()){
            case "ping":
                if($argg == null){
                    if($sender instanceof Player){
                        $this->getPing($sender, $sender);
                    } else {
                        $sender->sendMessage("§cUse /ping <playername>");
                    }
                } else {
                    $target = $this->getServer()->getPlayerByPrefix($argg);
                    if(!$target instanceof Player){
                        $sender->sendMessage("§cPlayer Not Found!");
                    } else {
                        $this->getPing($sender, $target);
                    }
                }
            break;
        }
    return true;
    }
}
