-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: recipedb
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `nutritions`
--

DROP TABLE IF EXISTS `nutritions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nutritions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `kcal` decimal(11,2) NOT NULL,
  `fat` decimal(11,2) NOT NULL,
  `saturates` decimal(11,2) NOT NULL,
  `carbs` decimal(11,2) NOT NULL,
  `sugars` decimal(11,2) NOT NULL,
  `fibre` decimal(11,2) NOT NULL,
  `protein` decimal(11,2) NOT NULL,
  `salt` decimal(11,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nutrition_recipe_fk` (`recipe_id`),
  CONSTRAINT `nutrition_recipe_fk` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nutritions`
--

LOCK TABLES `nutritions` WRITE;
/*!40000 ALTER TABLE `nutritions` DISABLE KEYS */;
INSERT INTO `nutritions` VALUES (1,1,477.00,13.00,4.00,58.00,14.00,5.00,30.00,0.70),(2,2,589.00,18.00,5.00,83.00,18.00,8.00,19.00,0.50),(3,3,546.00,32.00,14.00,15.00,11.00,4.00,52.00,0.65),(4,4,575.00,39.00,14.00,20.00,1.00,5.00,34.00,0.53),(5,5,353.00,10.00,2.00,24.00,21.00,7.00,38.00,1.60),(6,6,301.00,20.00,2.00,50.00,14.00,4.00,50.00,0.40),(7,7,301.00,9.00,2.00,44.00,13.00,4.00,9.00,0.80),(8,8,217.00,2.00,0.40,26.00,1.00,0.60,26.00,2.60),(9,9,350.00,17.00,6.00,33.00,2.00,2.00,14.00,1.00),(10,10,476.00,9.00,3.00,74.00,6.00,9.00,20.00,0.10),(11,11,258.00,10.00,2.00,22.00,5.00,7.00,17.00,0.70),(12,12,30.00,2.00,0.20,2.00,1.00,1.00,1.00,0.02),(13,13,483.00,20.00,3.00,53.00,3.00,11.00,18.00,1.06),(14,14,63.00,2.00,0.00,4.00,2.00,4.00,4.00,0.10),(15,15,65.00,6.00,1.00,2.00,2.00,1.00,1.00,0.10),(16,16,296.00,14.00,2.00,30.00,9.00,12.00,14.00,0.80),(17,17,762.00,59.00,17.00,22.00,22.00,4.00,33.00,2.90),(19,19,409.00,29.00,18.00,30.00,2.00,3.00,4.00,0.20),(20,20,394.00,12.00,1.00,61.00,4.00,8.00,7.00,0.12);
/*!40000 ALTER TABLE `nutritions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe`
--

DROP TABLE IF EXISTS `recipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` int(11) NOT NULL,
  `ratings` decimal(10,0) NOT NULL,
  `preparation_time` decimal(10,0) NOT NULL,
  `cooking_time` decimal(10,0) NOT NULL,
  `serving` int(11) NOT NULL,
  `ingredients` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`ingredients`)),
  `methods` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`methods`)),
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author_user_fk` (`author`),
  CONSTRAINT `author_user_fk` FOREIGN KEY (`author`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe`
--

LOCK TABLES `recipe` WRITE;
/*!40000 ALTER TABLE `recipe` DISABLE KEYS */;
INSERT INTO `recipe` VALUES (1,'One-pan pasta',10,6,5,30,4,'[\"1 tbsp rapeseed oil\",\"12 meatballs (300g)\",\"1 onion, finely chopped\",\"3 garlic cloves, finely chopped\",\"2 tbsp ketchup\",\"2 x 400g cans chopped tomatoes\",\"1 large bunch of basil, finely chopped, plus a few whole leaves\",\"225g dried spaghetti\"]','[\"Heat the oil in a deep, wide frying pan or casserole dish over a medium-high heat. Tip in the meatballs and cook for 5 mins, turning until browned all over. Add the onion and garlic, and fry for 8 more mins until softened.\",\"Add the ketchup, chopped tomatoes, chopped basil and 400ml water to the pan and bring to the boil. Add the spaghetti and cook for 10-12 mins, stirring occasionally. When the pasta is cooked and the sauce has reduced, season and sprinkle with the basil leaves to serve.\"]','onepanpasta.png'),(2,'Sausage ragu',1,345,5,45,4,'[\"3 tbsp olive oil\",\"1 onion, finely chopped\",\"2 large garlic cloves, crushed\",\"\\u00bc tsp chilli flakes\",\"2 rosemary sprigs, leaves finely chopped\",\"2 x 400g cans chopped tomatoes\",\"1 tbsp brown sugar\",\"6 pork sausages\",\"150ml whole milk\",\"1 lemon, zested\",\"350g rigatoni pasta\",\"grated parmesan and \\u00bd small bunch parsley, leaves roughly chopped, to serve\"]','[\"Heat 2 tbsp of the oil in a saucepan over a medium heat. Fry the onion with a pinch of salt for 7 mins. Add the garlic, chilli and rosemary, and cook for 1 min more. Tip in the tomatoes and sugar, and simmer for 20 mins.\",\"Heat the remaining oil in a medium frying pan over a medium heat. Squeeze the sausagemeat from the skins and fry, breaking it up with a wooden spoon, for 5-7 mins until golden. Add to the sauce with the milk and lemon zest, then simmer for a further 5 mins. To freeze, leave to cool completely and transfer to large freezerproof bags.\",\"Cook the pasta following pack instructions. Drain and toss with the sauce. Scatter over the parmesan and parsley leaves to serve.\"]','sausageragu.png'),(3,'Easy roast beef',2,77,15,60,4,'[\"1 tsp plain flour\",\"1 tsp mustard powder\",\"950g beef top rump joint (see tip below)\",\"1 onion, cut into 8 wedges\",\"500g carrots, halved lengthways\",\"For the gravy:\",\"1 tbsp plain flour\",\"250ml beef stock\"]','[\"Heat oven to 240C\\/220C fan\\/gas 9\",\"Mix 1 tsp plain flour and 1 tsp mustard powder with some seasoning, then rub all over the 950g beef top rump joint.\",\"Put 1 onion, cut into 8 wedges, and 500g carrots, halved lengthways, into a roasting tin and sit the beef on top, then cook for 20 mins.\",\"Reduce oven to 190C\\/170C fan\\/gas 5 and continue to cook the beef for 30 mins if you like it rare, 40 mins for medium and 1 hr for well done.\",\"Remove the beef and carrots from the oven, place onto warm plates or platters and cover with foil to keep warm.\",\"Let the beef rest for 30 mins while you turn up the oven to cook your Yorkshire puds and finish the potatoes.\",\"For the gravy, put the tin with all the meat juices and onions back onto the hob.\",\"Stir in 1 tbsp plain flour, scraping all the stuck bits off the bottom of the tin. Cook for 30 seconds, then slowly stir in 250ml beef stock, little by little.\",\"Bubble to a nice gravy, season, then serve with the beef, carved into slices, carrots and all the other trimmings.\"]','easyroastbeef.png'),(4,'Pot-roasted beef brisket',3,50,25,135,8,'[\"1-1\\u00bckg\\/2\\u00bc-2\\u00be lb boned and rolled beef brisket\",\"5 tbsp vegetable oil\",\"large knob of butter\",\"2 large onions, halved and sliced\",\"2-3 celery sticks, finely chopped\",\"2 carrots, sliced\",\"200-250g\\/8-9oz large flat mushrooms, stalks chopped and heads thinly sliced\",\"500-550ml bottle brown ale or stout\",\"a few fresh thyme sprigs\",\"2 bay leaves\",\"1-2 tsp light muscovado sugar\",\"500g parsnips, cut into wedges\",\"1 tbsp Dijon mustard\",\"chopped fresh parsley or thyme to serve\"]','[\"Preheat the oven to 190C\\/Gas 5\\/fan oven 170C. Wash and dry brisket and season. Heat 2 tablespoons of oil in a deep casserole and brown beef all over. Remove from pan. Turn down heat, add butter and fry the onions, celery, carrots and mushroom stalks for 6-8 minutes.\",\"Return beef to pan and add beer, thyme, bay leaves and sugar. Add water if necessary so the liquid comes about two-thirds up the beef. Season, bring to a simmer, cover tightly, and cook in the oven for 20 minutes. Reduce heat to 160C\\/Gas 3\\/fan oven 140C and cook for 2 hours, turning twice, until tender\",\"An hour before the beef is done, toss the parsnips in oil, season and roast on a baking tray above the beef for 50 mins - 1 hr until tender, turning once.\",\"Turn oven up to 190C\\/Gas 5\\/fan oven 170C. Lift out the beef, tent with foil and keep warm. Stir the parsnips and mushroom caps into the beef juices. Check seasoning; add water if needed. Cover and cook in the oven for 20-25 minutes until mushrooms are tender.\",\"To serve, use a slotted spoon to remove vegetables and arrange round the beef. Spoon off the excess fat from the juices, then whisk in the mustard and pour into a jug. Moisten the beef with a little juice and scatter with parsley or thyme\"]','potroastedbeefbrisket.png'),(5,'Chicken satay salad',4,172,15,10,2,'[\"1tbsp tamari\",\"1tsp medium curry powder\",\"\\u00bctsp ground cumin\",\"1 garlic clove, finely grated\",\"1tsp clear honey\",\"2 skinless chicken breast fillets (or use turkey breast)\",\"1tbsp crunchy peanut butter (choose a sugar-free version with no palm oil, if possible)\",\"1tbsp sweet chilli sauce\",\"1tbsp lime juice\",\"sunflower oil, for wiping the pan\",\"2 Little Gem lettuce hearts, cut into wedges\",\"\\u00bc cucumber, halved and sliced\",\"1 banana shallot, halved and thinly sliced\",\"coriander, chopped\",\"seeds from \\u00bd pomegranate\"]','[\"Pour the tamari into a large dish and stir in the curry powder, cumin, garlic and honey. Mix well. Slice the chicken breasts in half horizontally to make 4 fillets in total, then add to the marinade and mix well to coat. Set aside in the fridge for at least 1 hr, or overnight, to allow the flavours to penetrate the chicken.\",\"Meanwhile, mix the peanut butter with the chilli sauce, lime juice, and 1 tbsp water to make a spoonable sauce. When ready to cook the chicken, wipe a large non-stick frying pan with a little oil. Add the chicken and cook, covered with a lid, for 5-6 mins on a medium heat, turning the fillets over for the last min, until cooked but still moist. Set aside, covered, to rest for a few mins.\",\"While the chicken rests, toss the lettuce wedges with the cucumber, shallot, coriander and pomegranate, and pile onto plates. Spoon over a little sauce. Slice the chicken, pile on top of the salad and spoon over the remaining sauce. Eat while the chicken is still warm.\"]','chickensataysalad.png'),(6,'Pomegranate chicken with almond couscous',5,153,5,15,4,'[\"1\\u00bd tbsp sunflower or vegetable oil\",\"2 eggs , beaten\",\"2 garlic cloves , crushed\",\"small bunch of spring onions , chopped\",\"1\\u20442 tsp Chinese five-spice powder\",\"400g cooked long-grain rice\",\"85g frozen peas\",\"2 tsp sesame oil\",\"2 tbsp low-salt soy sauce\",\"400g fresh pineapple , roughly chopped into chunks (about 1\\u20442 medium pineapple)\"]','[\"1 Heat 1 tbsp oil in a wok. Add the eggs, swirling them up the sides, to make a thin omelette. Once cooked through, roll the omelette onto a chopping board and cut into ribbons.\",\"Heat the remaining oil. Add the garlic, onions and five-spice. Stir-fry until sizzling, then add the rice (if using pouches, squeeze them first, to separate the grains), peas, sesame oil and soy. Cook over a high heat until the rice is hot, then stir through the pineapple and omelette ribbons.\"]','pomegranatechicken.png'),(7,'Pineapple fried rice',5,34,10,10,4,'[\"1\\u00bd tbsp sunflower or vegetable oil\",\"2 eggs , beaten\",\"2 garlic cloves , crushed\",\"small bunch of spring onions , chopped\",\"1\\u20442 tsp Chinese five-spice powder\",\"400g cooked long-grain rice\",\"85g frozen peas\",\"2 tsp sesame oil\",\"2 tbsp low-salt soy sauce\",\"400g fresh pineapple , roughly chopped into chunks (about 1\\u20442 medium pineapple)\"]','[\"1 Heat 1 tbsp oil in a wok. Add the eggs, swirling them up the sides, to make a thin omelette. Once cooked through, roll the omelette onto a chopping board and cut into ribbons.\",\"Heat the remaining oil. Add the garlic, onions and five-spice. Stir-fry until sizzling, then add the rice (if using pouches, squeeze them first, to separate the grains), peas, sesame oil and soy. Cook over a high heat until the rice is hot, then stir through the pineapple and omelette ribbons.\"]','pineapplefriedrice.png'),(8,'Chicken noodle soup',12,175,10,30,2,'[\"900ml chicken or vegetable stock (or Miso soup mix)\",\"1 boneless, skinless chicken breast (about 175g)\",\"1 tsp chopped fresh ginger\",\"1 garlic clove, finely chopped\",\"50g rice or wheat noodles\",\"2 tbsp sweetcorn, canned or frozen\",\"2-3 mushrooms, thinly sliced\",\"2 spring onions, shredded\",\"2 tsp soy sauce, plus extra for serving\",\"mint or basil leaves and a little shredded chilli (optional), to serve\"]','[\"Pour the stock into a pan and add the chicken breast, ginger and garlic. Bring to the boil, then reduce the heat, partly cover and simmer for 20 mins, until the chicken is tender.\",\"Put the chicken on a board and shred into bite-size pieces using a couple of forks. Return the chicken to the stock with the noodles, sweetcorn, mushrooms, spring onion and soy sauce. Simmer for 3-4 mins until the noodles are tender.\",\"Ladle into two bowls and scatter over the remaining spring onion, mint or basil leaves and chilli, if using. Serve with extra soy sauce.\"]','chichennoodlessoup.png'),(9,'Pancakes for one',1,127,10,10,1,'[\"1 large egg\",\"40g plain flour\",\"\\u00bd tsp baking powder\",\"45ml milk (dairy, nut or oat based)\",\"1 tsp butter\",\"\\u00bd tbsp oil\",\"1 banana shallot, halved and thinly sliced\"]','[\"Separate the egg, putting the white and yolk in separate bowls. Mix the egg yolk with the flour, baking powder and milk to make a smooth paste.\",\"Beat the egg white and a pinch of salt with an electric whisk (or by hand) until fluffy and holding its shape. Gently fold the egg white into the yolk mixture. Be extra careful not to knock any of the air out.\",\"Heat the butter and oil in a non-stick frying pan. Dollop a third of the mixture into the pan and cook on each side for 1-2 mins or until golden brown. Repeat with the remaining mixture to make three pancakes. Drizzle over some maple syrup or honey and serve with berries, if you like.\"]','pancakesforone.png'),(10,'Healthy pasta primavera',3,53,10,20,4,'[\"75g young broad beans (use frozen if you can\'t get fresh)\",\"2 x 100g pack asparagus tips\",\"170g peas (use frozen if you can\'t get fresh)\",\"350g spaghetti or tagliatelle\",\"175g pack baby leeks , trimmed and sliced\",\"1 tbsp olive oil , plus extra to serve\",\"1 tbsp butter\",\"200ml tub fromage frais or creme fraiche\",\"handful fresh chopped herbs (we used mint, parsley and chives)\",\"parmesan (or vegetarian alternative), shaved, to serve\"]','[\"Bring a pan of salted water to the boil and put a steamer (or colander) over the water. Steam the beans, asparagus and peas until just tender, then set aside. Boil the pasta following pack instructions.\",\"Meanwhile, fry the leeks gently in the oil and butter for 5 mins or until soft. Add the fromage frais to the leeks and very gently warm through, stirring constantly to ensure it doesn\\u2019t split. Add the herbs and steamed vegetables with a splash of pasta water to loosen.\",\"Drain the pasta and stir into the sauce. Adjust the seasoning, then serve scattered with the cheese and drizzled with a little extra olive oil.\"]','healthypastaprimaver.png'),(11,'Curried broccoli & boiled eggs on toast',6,2,10,15,2,'[\"\\u00bd tsp turmeric\",\"1 tsp garam masala\",\"\\u00bd tbsp rapeseed oil\",\"200g Tenderstem broccoli\",\"2 medium eggs\",\"2 slices wholemeal sourdough\",\"1 tbsp natural yogurt\",\"1 tbsp pomegranate seeds\"]','[\"Heat oven to 200C\\/180C\\/gas 6. Mix together the spices and oil, then toss with the broccoli and some seasoning on a baking tray. Roast for 12-15 mins until tender.\",\"Meanwhile, bring a small pan of water to the boil, lower in the eggs and boil for 6-8 mins, depending on how you like them, then immediately rinse under cold water, peel and halve. Toast the bread, then spread with the yogurt. Top each slice with the roasted broccoli and an egg, then scatter over the pomegranate seeds.\"]','curriedbroccoliboiledeggsontoast.png'),(12,'Roasted radishes',6,1,5,35,6,'[\"400g radishes\",\" garlic cloves, unpeeled and bashed\",\"1 tbsp rapeseed oil\"]','[\"Heat the oven to 200C\\/180C fan\\/ gas 6. Tip the radishes and bashed garlic cloves into a roasting tin, season well and drizzle with the oil. Toss to coat the radishes and garlic.\",\"Roast for 30-40 mins, or until the radishes are tender. Squeeze the garlic from its skins, then stir gently and serve.\"]','roastedradishes.png'),(13,'Creamy spinach & mushroom penne',4,6,10,10,2,'[\"175g wholemeal penne\",\"50g unroasted, unsalted cashews\",\"10g dried porcini mushrooms\",\"1 tsp vegetable bouillon powder\",\"1 tbsp rapeseed oil\",\"120g chestnut mushrooms, halved if large, thinly sliced\",\"2 large garlic cloves, finely grated\",\"200g baby spinach\"]','[\"Cook the penne following pack instructions and put the kettle on to boil. Meanwhile, put the cashews and dried mushrooms in a medium heatproof bowl along with the bouillon powder, and pour over 200ml boiling water from the kettle. Leave to soak for 5 mins. After this time, blitz the mixture with a hand blender until smooth and creamy.\",\"Heat the oil in a large non-stick frying pan over a medium heat and fry the fresh mushrooms and garlic for a couple of minutes until just starting to soften. Add the spinach and continue to cook, stirring frequently until the spinach has wilted. Drain the pasta, reserving a little of the cooking water. Tip the pasta into the pan with the mushroom mixture, season with plenty of black pepper and toss everything together well. Remove from the heat and stir through the creamy mushroom sauce, adding a drop of the reserved cooking water if needed to loosen. Serve straightaway.\"]','Creamyspinachandmushroompenne.png'),(14,'Warm spring vegetables',2,9,20,3,6,'[\"2 large courgettes , sliced into ribbons with a vegetable peeler\",\"juice 1 lemon\",\"200g asparagus spears , washed and trimmed\",\"100g frozen peas\",\"100g frozen broad beans\",\"1 tbsp extra virgin olive oil\",\"small pack parsley , roughly chopped\"]','[\"Put the courgette ribbons in a large bowl with a pinch of salt and the lemon juice..\",\"Bring a large saucepan of water to the boil and cook the asparagus for 2 mins, adding the frozen peas and broad beans for the final min. Drain well, pod the broad beans and toss together with the courgette ribbons. Drizzle over the olive oil, sprinkle on parsley and season to taste.\"]','warmspringvegetables.png'),(15,'Simple roast radishes',7,3,0,20,1,'[\"450g radishes\",\"2 tbsp olive oil\"]','[\"Heat oven to 180C\\/160C fan\\/gas 4. Remove the leaves from the radishes and if they are nice and fresh, set aside. Halve the radishes and tip into a roasting tin with the olive oil.\",\"Roast for 20 mins until shrivelled and softened, then remove from the oven. Season with salt, toss with some of the leaves to wilt and serve.\"]','roastradishes.png'),(16,'Pepper & walnut hummus with veggie dippers',4,9,10,6,2,'[\"400g can chickpeas , drained\",\"1 garlic clove\",\"1 large roasted red pepper from a jar (not in oil), about 100g\",\"1 tbsp tahini paste\",\"juice \\u00bd lemon\",\"4 walnut halves , chopped\",\"2 carrots , cut into batons\",\"2 celery sticks, cut into batons\"]','[\"Put the chickpeas, garlic, pepper, tahini and lemon juice in a bowl. Blitz with a hand blender or in a food processor to make a thick pur\\u00e9e. Stir in the walnuts. Pack into pots, if you like, and serve with the veggie sticks. Will keep in the fridge for two days, although the vegetables are best prepared fresh to preserve their vitamins.\"]','houmous.png'),(17,'Roast spiced duck with plums',7,17,35,145,4,'[\"1 star anise\",\"2 tbsp coriander seeds\",\"4 tbsp muscovado sugar\",\"2 \\u00bdkg whole duck\",\"1 tsp olive oil\",\"6 plums , halved and stoned\",\"3 bay leaves\",\"75ml red wine vinegar\",\"300ml chicken stock\"]','[\"Heat oven to 160C\\/140C fan\\/gas 4. Toast the star anise and coriander seeds in a dry pan until aromatic. Tip the toasted spices into a spice grinder with 2 tsp sea salt and grind into a fine powder (or crush using a pestle and mortar). Put the spice salt in a bowl, add the sugar, mix well and set aside.\",\"Lightly score the skin of the duck in a criss-cross pattern and heat the oil in a large casserole. Using a pair of tongs to turn it, brown the duck well on all sides, pour off the excess fat, then sit the duck breast-side up and season all over with the sugar and spice mix. Pack the plums around the outside, then scatter over the bay and pour over the vinegar and stock.\",\"Roast in the oven for 2 hrs or until the duck is golden and the plums have broken down. Turn the oven right up for 10 more mins to crisp up the skin. Take the duck out of the pan to rest for 10 mins and spoon the excess fat off the plums. Carve the duck and serve with a good spoonful of plums.\"]','roastspicedduckwithplums.png'),(19,'Fondant potatoes',1,36,8,40,6,'[\"garlic cloves, unpeeled and bashed\",\"1 tbsp olive oil\",\"200g unsalted butter, cubed\",\"4 large garlic cloves, bashed\",\"2 sprigs rosemary\",\"2 sprigs thyme\",\"200ml chicken or vegetable stock\"]','[\"Slice the ends off the potatoes so they lie flat on either side.\",\"Heat the oil in a pan over a medium-low heat. When hot, add the potatoes cut-side down. Fry for 5-7 mins, or until deep golden brown, then flip and fry on the other side. Add the butter to the pan to melt.\",\"Scatter the garlic and herbs around the potatoes and season well. Carefully pour the stock around the veg, being aware of any hot butter that may splash out. Cover and simmer gently for 25-30 mins, or until the potatoes are tender, then serve.\"]','fondantpotatoes.png'),(20,'Hasselback potatoes',9,17,15,60,4,'[\"1.5kg medium-sized floury potatoes (Maris piper or King Edward work well), peeled if you like\",\"4 tbsp vegetable oil\",\"4 garlic cloves, bashed\",\"a few sprigs of rosemary\",\"sea salt flakes\"]','[\"Heat the oven to 200C\\/180C fan\\/gas 6. Use a metal skewer and insert through the back of one of the flatter sides of the potato. It should go through most of the potato. Place on a chopping board, skewer-side down, and slice through the potato (be careful not to cut all the way through on both ends). You can also put each potato in-between two handles of wooden spoons, and cut through to the spoon, if this is easier for you. A sharp knife will help to make slices a few mm apart. Remove the skewer and repeat with the remaining potatoes.\",\"Put the potatoes cut-side up on a shallow baking tray and drizzle over the oil. Rub each potato with your hands to coat well in the oil, getting some in between the slices. Toss in the bashed garlic, rosemary, and season well. Roast for 50 mins \\u2013 1 hr until the potatoes are tender throughout and the tops are golden and crisp. Baste with any oil in the pan halfway cooking to get extra crisp potatoes.\"]','HasselbackPotatoes.png');
/*!40000 ALTER TABLE `recipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'etherclark@gmail.com','Esther','Clark','etherclark@gmail.com','abc@123'),(2,'jamesmartin@gmail.com','James','Martin','jamesmartin@gmail.com','abc@123'),(3,'goodfoodteam@gmail.com','Good Food','team','goodfoodteam@gmail.com','abc@123'),(4,'sarabuenfeld@gmail.com','Sara','Buenfeld','sarabuenfeld@gmail.com','abc@123'),(5,'cassiebest@gmail.com','Cassie','Best','cassiebest@gmail.com','abc@123'),(6,'sophiegodwin@gmail.com','Sophie','Godwin','sophiegodwin@gmail.com','abc@123'),(7,'tomkerridge@gmail.com','Tom','Kerridge','tomkerridge@gmail.com','abc@123'),(8,'barneydesmazery@gmail.com','Barney','Desmazery','barneydesmazery@gmail.com','abc@123'),(9,'annaglover@gmail.com','Anna','Glover','annaglover@gmail.com','abc@123'),(10,'libertymendez@gmail.com','Liberty','Mendez','libertymendez@gmail.com','abc@123'),(11,'donna@p.com','Donna','P','','harvey'),(12,'marycadogan@gmail.com','Mary','Cadogan','marycadogan@gmail.com','abc@123');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-17 19:02:03