<?php
declare(strict_types = 1);
namespace skynet;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat;
use pocketmine\item\Item;
use pocketmine\nbt\tag\ListTag;
use pocketmine\command\ConsoleCommandSender;
class Main extends PluginBase implements Listener {
	public function onEnable() : void {
		$this->getLogger()->info("Plugin has been Enabled!");
	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->saveDefaultConfig();
	}
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) : bool
	{
		if ($sender instanceof Player) {
			switch ($cmd->getName()) {
				case "ping":
					$sender->sendMessage("§l»§r §ePing §4" . $sender->getPing() . " §eMS.");
					return true;
	        }
		} else {
                $sender->sendMessage(TextFormat::RED . "Please run this command in-game!");
		}
	}
	public function onDisable() : void {
		$this->getLogger()->info("Plugin has been Disabled!");
	}
}
