<?php

namespace DiscordUI\Main;

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

        $this->getLogger()->info(TextFormat::RED . "Deaktiviert!");

    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {

        switch($cmd->getName()){                    

            case "DC":

                if ($sender->hasPermission("DC.command")){

                     $this->openMyForm($sender);

                }else{     

                     $sender->sendMesseage(TextFormat::RED . "Du Hast Keine Rechte Fur Diesen Command");

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

                    $player->sendMessage(TextFormat::GREEN . "Discord: https://discord.gg/rrf3gqh");

                    $player->addTitle("§l§6Discord", "§a§lhttps://discord.gg/rrf3gqh");

                break;

                    

                case 1:

                    $player->sendMessage(TextFormat::RED . "Discord: https://discord.gg/rrf3gqh!");

                    $player->addTitle("§l§6DC", "§c§lDiscord : https://discord.gg/rrf3gqh");

                break;

            }

            

            

            });

            $form->setTitle("§l§6DiscordUI");

            $form->setContent("§4§lWahle Eine Option!");

            $form->addButton("§lDiscord : https://discord.gg/rrf3gqh");

            $form->addButton("§lDiscord : https://discord.gg/rrf3gqh");

            $form->addButton("§l§cDiscordUI Schlissen\Close");

            $form->sendToPlayer($player);

            return $form;                                            

    }

                                                                                                                                                                                                                                                                                          

}
