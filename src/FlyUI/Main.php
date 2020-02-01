<?php

namespace FlyUI;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener {


    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);    
        $this->getLogger()->info(TextFormat::GREEN . "Aktiviert!");
    }

    public function onDisable() {
$this->getServer()->getPluginManager()->registerEvents($this,$this);
        $this->getLogger()->info(TextFormat::RED . "Aus!");
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
        switch($cmd->getName()){                    
            case "Fly":
                if ($sender->hasPermission("fly.cmd")){
                     $this->openMyForm($sender);
                }else{     
                     $sender->sendMesseage(TextFormat::RED . "Du Hast Keine rechte!");
                     return true;
                }     
            break;         
            
         }  
        return true;                         
    }
   
    public function openMyForm($player){ 
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $player, int $data = null){
            $result = $data;
            if($result === null){
                return true;
            }             
            switch($result){
                case 0:
                    $player->sendMessage(TextFormat::GREEN . "Aktiviert dein Fliegen!");
                    $player->addTitle("§l§4Fly", "§a§lAktiviert");
                    $player->setAllowFlight(true);
                break;
                    
                case 1:
                    $player->sendMessage(TextFormat::RED . "Fliegen Deaktiviert! Made by Crow Balde");
                    $player->addTitle("§l§4Fly", "§c§lDeaktiviert");
                    $player->setAllowFlight(false);
                break;
            }
            
            
            });
            $form->setTitle("§l§9FlyUI Von Crow Balde");
            $form->setContent("ent("Aus");
            $form->addButton("§l§4Aktiviert");
            $form->addButton("§l§4Deaktiviert");
            $form->addButton("§l§4Verlassen");
            $form->sendToPlayer($player);
            return $form;                                            
    }
                                                                                                                                                                                                                                                                                          
}
