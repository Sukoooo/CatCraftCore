<?php                               
//                                                                                                    
//                              :                                                                     
//                             `#+                                                                    
//                             +.@#                                                                   
//                             @..@;                                                                  
//                            #....@                                                                  
//                            @....:@                                         :                       
//                           +:.....#+                                      '@@                       
//                           @.......@`                                    +@.@'                      
//                          '#.......;@                                   @@...@                      
//                          @.........@:                                `@#....@`                     
//                         '@.........,@                               :@+.....#@                     
//                         @:..........@'                             '@:......,@                     
//                        `@............@                            '@.........@                     
//                        @+............#+                          '@..........@;                    
//                        @,............,@                         '@...........#@                    
//                       +@..............@:                       :@,...........:@                    
//                       @:..............;@    ,;++#++';,        `@:.............@                    
//                      `@................@@@@@@@#####@@@@@@@@;. @+..............@`                   
//                      @+................,':..............,'@@#@@...............@;                   
//                      @......................................,:................#@                   
//                     #@........................................................+@                   
//                     @:........................................................:@                   
//                    ;@..........................................................@.                  
//                    @'..........................................................@'                  
//                    @...........................................................@#                  
//                   @@...........................................................#@                  
//                   @'...........................................................:@                  
//                  ,@.............................................................@:                 
//                  @@.............................................................@#                 
//                  @+.............................................................@@                 
//                  @,.............................................................,@                 
//                 '@...............................................................@#                
//                 @@...............................................................@@                
//                 @@...............................................................,@                
//                 @#................................................................@#               
//                 @#......;#@#;.....................................................#@               
//                 @#........,'@@@:..................................................;@               
//                .@'............'@@:.................................................@;              
//                ,@;..............;@@.............................:#@@@@@@@#.........@@              
//                :@#....`````.......@@;........................,@@@@@+;:::':.........@@              
//                ,@#...``````........#@:......................@@@;...................#@              
//                 @@...``````.........,......................@@,.....................+@              
//                 @@...``````........................................................+@              
//                 #@....````..............................................`````......+@              
//                 '@,....................................................```````.....@@              
//                  @@....................................................```````.....@@              
//                  @@.......................,.;@@@':,,,...................`````......@@              
//                  +@+......................#@@:`+@@@@@....................```.......@@              
//                   @@........................#````@'...............................'@+              
//                   @@#......................,@```;@................................@@               
//                   `@@......................:@```@+................................@@               
//                    +@@.....................:@```@:...............................@@;               
//                     @@@.....................@```@...............................,@@                
//                      @@+....................@'`:@...............................@@;                
//                      ,@@#...................:@,@+..............................#@@                 
//                       '#@@...................'@@..............................@@@                  
//                        ;#@@,................................................,@@@                   
//                          @@@@..............................................+@@@                    
//                           #@@@@,.........................................:@@@@                     
//                            `@@@@@'.....................................:@@@@`                      
//                              ,@@@@@@;................................'@@@@;                        
//                                @@+@@@@@#;........................:+@@@@@@@                         
//                                @#,,,'@@@@@@@',,,.........,,;+@@@@@@@@+:,,#'                        
//                                @#,,,,,,;@@@@@@@@@@@@@@@@@@@@@@@@#':,,,,,,;@                        
//                               .@',,,,,,,,,,,;+@@@@@@@@##+'';,,,,,,,,,,,,;@@@                       
//                               :@@',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,:@@@.@:                      
//                               +@#@@@;,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,'@@@;..#@                      
//                               #@..'@@@@@#;,,,,,,,,,,,,,,,,,,,,,,,;@@@@@.....@+                     
//                               @#.....:+@@@@@@@#+;,,,,,,,,,,,,;#@@@@@#.......#@                     
//                               @#..........:#@@@@@@@@@@@@@@@@@@@@#:...........@#                    
//                               @#............@@@;+@@@@@@@@@#+',...............'@                    
//                              `@'...........+@@````+@+.........................@#                   
//                              ,@;...........@@ `````+@.........................'@                   
//                              '#:...........@`  ```` @..........................@#                  
//                              +#,...........@ ```,```@:.........................'@                  
//                              ##,...........@```@@ ` @,..........................@+                 
//                              ##,...........@@``#@``;@...........................+@                 
//                              #+............:@@.+@`'@@............................@'                
//                              #+.............:@@@@@@#.............................#@                
//                              #+...............:'#+,..............................,@,               
//                              #+...................................................@@              
//

namespace neko\catcore;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\event\TranslationContainer;
use pocketmine\Server;

private $config;

class Main extends PluginBase{
  public function onLoad(){
    $this->getLogger()->info("[CatCore loading]");
     $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
  }
  public function onEnable(){
    $this->getLogger()->info("[CatCore enabled]");
  }
  public function onDisable(){
    $this->getLogger()->info("[CatCore disabled]");
  }
  public function onJoin(PlayerJoinEvent $event){
   $player = $event->getPlayer();
   $name = $player->getName();
   // ToDo $sender->getServer()->broadcastMessage("Welcome " . $name . ", " . $nekoMsg->getMessage());
   Server::getInstance()->broadcastMessage($this->PlayerRespawnEvent->getPlayer()->getDisplayName() . $nekoMsg->getMessage());
  }
}

class nekoMsg {
 public $message = $this->plugin->getConfig()->get("joinmsg")
 public setMessage(Player $player, $message, $string){
   if($player->hasPermission("catcore.setjoinmessage")){
      $this->config->set("joinmsg",  $message);
   }
 }
 public getMessage(Player $player, $message, $string){
  $string = $this->config->get("joinmsg");
   return $string;
 }
}
 public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
        switch($command->getName()) {
            case "setwelcomemessage":
                if($args[1] !== null){
                  $x = implode('', $args);
                  $this->nekoMsg->setMessage($sender, $x, $string);
                  $sender->sendMessage(TextFormat::GREEN . "Set Server's join message to: " . $nekoMsg->getMessage());
                }
                return true;
            case "Meowinfo":
                if (count($args) == 0 ){
                    return false;
                }
                var_dump($args); // do stuff
                return true;
        }
    }