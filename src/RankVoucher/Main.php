<?php

namespace RankVoucher;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\PluginTask;
use pocketmine\utils\TextFormat as TF;

class Main extends PluginBase implements Listener {

	public function onLoad() {
		
		$this->getServer()->getLogger()->notice("Rank Voucher is loading...");
	}
	
	public function onEnable() {
		
		$this->getServer()->getLogger()->notice("Rank Voucher has been enabled! Made by MonkleeGamer");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);	
	}

	public function onDisable() {
		
		$this->getServer()->getLogger()->notice("Rank Voucher is shutting down");
	}
	
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {
		
		if(strtolower($command->getName()) === "voucher") {
			
			if(count($args) < 2) {
			
				$sender->sendMessage(TF::GRAY . "§9Please use: §e/voucher (player) (rank)");
				$sender->sendMessage(TF::GRAY . "§9Available Ranks:");
				$sender->sendMessage(TF::GRAY . "§9Reaper, Magna, Titan, Overlord, Omega, Rebirth");
				$sender->sendMessage(TF::GRAY . "§9Plugin Made by MonkleeGamer");
				return true;
			}
			if($sender->hasPermission("voucher.command") || $sender->isOp()){
				
				if(isset($args[0])) {
				
					$player = $sender->getServer()->getPlayer($args[0]);
					
					if(isset($args[1])) {
						
						switch($args[1]) {
							
							case 1:
							case "Reaper":
							$book1 = Item::get(Item::BOOK, 101, 1);
							$book1->setCustomName(TF::RED . "§l§aReaper Voucher" . PHP_EOL . 
							TF::DARK_GRAY . " §9Click to redeem the §aReaper§9 Rank Voucher");
							
							$player->getInventory()->addItem($book1);
							
							break;
							
							case 2:
							case "Magna":
							$book2 = Item::get(Item::BOOK, 102, 1);
							$book2->setCustomName(TF::RED . "§l§bMagna Voucher" . PHP_EOL . 
							TF::DARK_GRAY . " §9Click to redeem the §bMagna§9 Rank Voucher");
							
							$player->getInventory()->addItem($book2);
							
							break;
							
							case 3:
							case "Titan":
							$book3 = Item::get(Item::BOOK, 103, 1);
							$book3->setCustomName(TF::RED . "§l§cTitan Voucher" . PHP_EOL . 
							TF::DARK_GRAY . " §9Click to redeem the §cTitan§9 Rank Voucher");
							
							$player->getInventory()->addItem($book3);
							
							break;
							
							case 4:
							case "Overlord":
							$book4 = Item::get(Item::BOOK, 104, 1);
							$book4->setCustomName(TF::RED . "§l§dOverlord Voucher" . PHP_EOL . 
							TF::DARK_GRAY . " §9Click to redeem the §9Overlord§9 Rank Voucher");
							
							$player->getInventory()->addItem($book4);
							
							break;
							
							case 5:
							case "Omega":
							$book5= Item::get(Item::BOOK, 105, 1);
							$book5->setCustomName(TF::RED . "§l§eOmega Voucher" . PHP_EOL . 
							TF::DARK_GRAY . " §9Click to redeem the §eOmega§9 Rank Voucher");
							
							$player->getInventory()->addItem($book5);
							
							break;
							
							case 6:
							case "Rebirth":
							$book6= Item::get(Item::BOOK, 106, 1);
							$book6->setCustomName(TF::RED . "§l§fRebirth Voucher" . PHP_EOL . 
							TF::DARK_GRAY . " §9Click to redeem the §fRebirth§9 Rank Voucher");
							
							$player->getInventory()->addItem($book6);
							
							break;
						}
					}
				}
			}
			
			if(!$sender->hasPermission("voucher.command")) {
				
				$sender->sendMessage(TF::GRAY . "§9You don't have permission to use this command.");
				
			}
			
			else {
				
				$sender->sendMessage(TF::GRAY . "§9You have been given a Rank Voucher");
				
			}
		}
		
		return true;
		
	}
	
	public function onInteract(PlayerInteractEvent $event) {
		
		$player = $event->getPlayer();
		
		if($event->getItem()->getId() === 340) {
		
			$damage = $event->getItem()->getDamage();
			
			switch($damage) {
				
				case 101:
                                case Reaper:
				
				$book1 = Item::get(Item::BOOK, 101, 1);

				$pperms = $this->getServer()->getPluginManager()->getPlugin("PurePerms");

                                $group = $pperms->getGroup("Reaper");
                                $pperms->setGroup($player, $group);

				$player->sendMessage(TF::BOLD . TF::DARK_GRAY . "§9You have redeemed the §aReaper§9 Rank Voucher");
				$player->getInventory()->removeItem($book1);
				
				break;
				
				case 102:
                                case Magna:
				
				$book2 = Item::get(Item::BOOK, 102, 1);

				$pperms = $this->getServer()->getPluginManager()->getPlugin("PurePerms");

                                $group = $pperms->getGroup("Magna");
                                $pperms->setGroup($player, $group);

				$player->sendMessage(TF::BOLD . TF::DARK_GRAY . "§9You have redeemed the §bMagna§9 Rank Voucher");
				$player->getInventory()->removeItem($book2);
				
				break;
				
				case 103:
                                case Titan:
				
				$book3 = Item::get(Item::BOOK, 103, 1);

				$pperms = $this->getServer()->getPluginManager()->getPlugin("PurePerms");

                                $group = $pperms->getGroup("Titan");
                                $pperms->setGroup($player, $group);

				$player->sendMessage(TF::BOLD . TF::DARK_GRAY . "§9You have redeemed the §cTitan§9 Rank Voucher");
				$player->getInventory()->removeItem($book3);
				
				break;

				
				case 104:
                                case Overlord:
				
				$book1 = Item::get(Item::BOOK, 104, 1);

				$pperms = $this->getServer()->getPluginManager()->getPlugin("PurePerms");

                                $group = $pperms->getGroup("Overlord");
                                $pperms->setGroup($player, $group);

				$player->sendMessage(TF::BOLD . TF::DARK_GRAY . "§9You have redeemed the §dOverlord§9 Rank Voucher");
				$player->getInventory()->removeItem($book4);
				
				break;

				
				case 105:
                                case Omega:
				
				$book5 = Item::get(Item::BOOK, 105, 1);

				$pperms = $this->getServer()->getPluginManager()->getPlugin("PurePerms");

                                $group = $pperms->getGroup("Omega");
                                $pperms->setGroup($player, $group);

				$player->sendMessage(TF::BOLD . TF::DARK_GRAY . "§9You have redeemed the §eOmega§9 Rank Voucher");
				$player->getInventory()->removeItem($book5);
				
				break;

				
				case 106:
                                case Rebirth:
				
				$book6 = Item::get(Item::BOOK, 106, 1);

				$pperms = $this->getServer()->getPluginManager()->getPlugin("PurePerms");

                                $group = $pperms->getGroup("Rebirth");
                                $pperms->setGroup($player, $group);

				$player->sendMessage(TF::BOLD . TF::DARK_GRAY . "§9You have redeemed the §fRebirth§9 Rank Voucher");
				$player->getInventory()->removeItem($book6);
				
				break;
				
			}
		}
	}
}		