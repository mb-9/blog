<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\CommentUser;
use App\Entity\ArticleAuthor;
use App\Entity\ArticleComment;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $articleAuthor = new ArticleAuthor();
        $articleAuthor->setEmail("tom.b@gmail.com");

        $articleAuthor2 = new ArticleAuthor();
        $articleAuthor2->setEmail("emma.m@gmail.com");

        $article1 = new Article();
        $article1->setTitle("Adam Melchor: The Soulful Songwriter");
        $article1->setDescription("Discover the soulful melodies of Adam Melchor and his heartfelt storytelling through music.");
        $article1->setContent("Adam Melchor, a singer-songwriter with a gift for crafting heartwarming tales in his music. Hailing from New Jersey, he draws inspiration from real-life experiences, infusing his songs with raw emotions. His music features a blend of folk, pop, and indie, creating a unique and authentic sound. With tracks like 'Real Estate' and 'I Don't Wanna See You Cryin' Anymore,' Adam Melchor has left an indelible mark on the indie music scene.");
        $article1->setIdAuthor($articleAuthor);
        
        $article2 = new Article();
        $article2->setTitle("Lizzie McAlpine: A Rising Star's Journey");
        $article2->setDescription("Exploring the rapid rise of Olivia Rodrigo and her chart-topping hits.");
        $article2->setContent("Lizzie McAlpine, a talented singer-songwriter and multi-instrumentalist, hails from California. Her music is marked by its vulnerability and relatability. With a gift for storytelling, Lizzie's lyrics delve into personal experiences and emotions, connecting with a broad audience. Tracks like 'To The Mountains' and 'Same Boat' exemplify her ability to craft intimate, introspective songs. Lizzie McAlpine is undoubtedly a rising star with a promising future in the music industry.");
        $article2->setIdAuthor($articleAuthor);
        
        $article3 = new Article();
        $article3->setTitle("Seafret: The Duo Crafting Heartfelt Ballads");
        $article3->setDescription("Discover the emotional ballads of Seafret and their soul-stirring melodies.");
        $article3->setContent("Seafret, a captivating English duo, weaves poignant ballads that tug at the heartstrings. Hailing from Bridlington, Jack Sedman and Harry Draper have created a musical world filled with raw emotion. Their songs like 'Oceans' and 'Atlantis' explore themes of love, longing, and the human experience, all set to beautifully soul-stirring melodies. With heartfelt lyrics and haunting harmonies, Seafret's music is an emotional journey that resonates deeply with their devoted fan base.");
        $article3->setIdAuthor($articleAuthor);
        
        $article4 = new Article();
        $article4->setTitle("The Paper Kites: Dreamy Folk Music's Pioneers");
        $article4->setDescription("Exploring the dreamy folk sound of The Paper Kites and their atmospheric music.");
        $article4->setContent("The Paper Kites, hailing from Melbourne, Australia, have made a name for themselves with their dreamy folk sound. With Samuel Bentley and Christina Lacy at the helm, their music is a captivating blend of acoustic folk, atmospheric soundscapes, and evocative storytelling. Songs like 'Bloom' and 'Woodland' transport listeners to a realm of introspection and daydreams. The Paper Kites have been pioneers in creating music that's not just heard but experienced.");
        $article4->setIdAuthor($articleAuthor);
        
        $article5 = new Article();
        $article5->setTitle("Paramore: A Decade of Rock and Resilience");
        $article5->setDescription("Celebrating the rock and resilience of Paramore and their iconic career.");
        $article5->setContent("Paramore, the iconic American rock band, has been a symbol of resilience in the music industry. Led by the charismatic Hayley Williams, the band has delivered hit after hit, from 'Misery Business' to 'Ain't It Fun.' Hailing from Tennessee, Paramore has garnered a dedicated global fan base with their energetic live performances and heartfelt lyrics. Their music represents an enduring journey of growth and self-discovery.");
        $article5->setIdAuthor($articleAuthor);
        
        $article6 = new Article();
        $article6->setTitle("Hayley Williams: From Paramore to Solo Stardom");
        $article6->setDescription("Discover Hayley Williams' transition from Paramore to a solo artist.");
        $article6->setContent("Hayley Williams, the dynamic vocalist of Paramore, embarked on a solo journey, showcasing her versatility. Hailing from Mississippi, her solo album 'Petals for Armor' explores personal growth, mental health, and introspection. The charismatic frontwoman has evolved from Paramore's pop-punk days into a solo artist with a distinctive musical identity, capturing hearts and ears worldwide.");
        $article6->setIdAuthor($articleAuthor);
        
        $article7 = new Article();
        $article7->setTitle("Bright Eyes: The Emotionally Charged Indie Folk");
        $article7->setDescription("Exploring the emotionally charged indie folk of Bright Eyes.");
        $article7->setContent("Bright Eyes, led by Conor Oberst, has been a defining force in indie folk music. Originating from Nebraska, the band's emotionally charged sound is both introspective and relatable. Their tracks like 'First Day of My Life' and 'Lua' have touched the hearts of many. Bright Eyes is celebrated for their introspective and evocative lyrics, making their music a deeply personal experience for listeners.");
        $article7->setIdAuthor($articleAuthor);
        
        $article8 = new Article();
        $article8->setTitle("Radiohead: Pioneers of Experimental Rock");
        $article8->setDescription("Celebrate the experimental rock pioneers, Radiohead, and their groundbreaking music.");
        $article8->setContent("Radiohead, the pioneers of experimental rock, have consistently pushed the boundaries of music. Hailing from Oxford, England, the band has released groundbreaking albums like 'OK Computer' and 'Kid A.' Their unique sound, blending rock, electronica, and artistry, has left an indelible mark on the music industry. Radiohead's ability to captivate and innovate continues to influence artists and listeners alike.");
        $article8->setIdAuthor($articleAuthor);
        
        $article9 = new Article();
        $article9->setTitle("The Cranberries: Timeless Irish Alternative Rock");
        $article9->setDescription("Rediscover the timeless Irish alternative rock of The Cranberries.");
        $article9->setContent("The Cranberries, fronted by the iconic Dolores O'Riordan, are known for their timeless Irish alternative rock. Originating from Limerick, Ireland, their hits like 'Linger' and 'Zombie' have become rock classics. Their music has resonated with a global audience, and the band's legacy in Irish rock music endures. The haunting vocals and evocative lyrics are a testament to their impact.");
        $article9->setIdAuthor($articleAuthor);
        
        $article10 = new Article();
        $article10->setTitle("Aurora: The Norwegian Electro-Pop Enchantress");
        $article10->setDescription("Explore the enchanting electro-pop of Aurora from Norway.");
        $article10->setContent("Aurora Aksnes, the enchanting Norwegian electro-pop artist, captivates with her ethereal sound. Hailing from Stavanger, Norway, her songs like 'Runaway' and 'Conqueror' transport listeners to a dreamlike realm. Her unique blend of electronic and folk influences, combined with her otherworldly vocals, has made her a standout figure in the music world. Aurora's music is a mesmerizing journey into the unknown.");
        $article10->setIdAuthor($articleAuthor);
        
        $article11 = new Article();
        $article11->setTitle("Orla Gartland: A Rising Indie Pop Star");
        $article11->setDescription("Discover the rising indie pop star Orla Gartland and her infectious melodies.");
        $article11->setContent("Orla Gartland, a rising star from Dublin, Ireland, enchants with infectious melodies and relatable lyrics. Her tracks like 'Why Am I Like This?' and 'Flatline' showcase her talent for crafting indie pop gems. Orla's fresh, relatable sound and dynamic songwriting have been turning heads in the music industry. She's poised for a promising future in the world of indie pop.");
        $article11->setIdAuthor($articleAuthor);
        
        $article12 = new Article();
        $article12->setTitle("Hozier: The Soulful Voice of Irish Folk");
        $article12->setDescription("Experience the soulful voice of Hozier in Irish folk music.");
        $article12->setContent("Hozier, born Andrew John Hozier-Byrne, is an Irish singer-songwriter acclaimed for his soulful voice and masterful fusion of folk, blues, and soul. Originating from County Wicklow, Ireland, his debut single, 'Take Me to Church,' became a worldwide sensation, addressing themes of love, religion, and human rights. Hozier's self-titled debut album showcased his immense talent, and tracks like 'Someone New' and 'Work Song' conveyed deep emotions through a distinctive sound that resonates with fans worldwide. In 2019, 'Wasteland, Baby!,' his sophomore album, debuted at number one on the US Billboard 200 chart. The album includes songs like 'Nina Cried Power' and 'Almost (Sweet Music),' showcasing his growth as an artist while retaining his signature style. Hozier's music is a heartfelt exploration of the human experience, with a powerful voice and soul-stirring songwriting that has solidified him as a true musical force, captivating hearts around the world.");
        $article12->setIdAuthor($articleAuthor);
        
    

      


        $commentUser = new CommentUser();
        $commentUser->setEmail('testemail@gmail.com');
       
        

        $comment1 = new ArticleComment();
        $comment1->setIdUser($commentUser);
        $comment1->setIdArticle($article1);
        $comment1->setMessage("Great article, very informative!");

        $comment2 = new ArticleComment();
        $comment2->setIdUser($commentUser);
        $comment2->setIdArticle($article1);
        $comment2->setMessage("I learned a lot from this post. Thanks!");

        $comment3 = new ArticleComment();
        $comment3->setIdUser($commentUser);
        $comment3->setIdArticle($article1);
        $comment3->setMessage("This is exactly what I was looking for. Good job!");

        $comment4 = new ArticleComment();
        $comment4->setIdUser($commentUser);
        $comment4->setIdArticle($article1);
        $comment4->setMessage("Well-written and concise. Kudos!");

        $comment5 = new ArticleComment();
        $comment5->setIdUser($commentUser);
        $comment5->setIdArticle($article1);
        $comment5->setMessage("I enjoyed reading this. Keep it up!");

        $comment6 = new ArticleComment();
        $comment6->setIdUser($commentUser);
        $comment6->setIdArticle($article1);
        $comment6->setMessage("Your insights are spot on. Thank you!");

        $comment7 = new ArticleComment();
        $comment7->setIdUser($commentUser);
        $comment7->setIdArticle($article1);
        $comment7->setMessage("This article is a gem. Well done!");

        $comment8 = new ArticleComment();
        $comment8->setIdUser($commentUser);
        $comment8->setIdArticle($article1);
        $comment8->setMessage("I found this very helpful. Keep sharing!");

        $comment9 = new ArticleComment();
        $comment9->setIdUser($commentUser);
        $comment9->setIdArticle($article1);
        $comment9->setMessage("Informative and engaging. Great work!");

        $comment10 = new ArticleComment();
        $comment10->setIdUser($commentUser);
        $comment10->setIdArticle($article1);
        $comment10->setMessage("This article deserves recognition. Impressive!");

        $comment11 = new ArticleComment();
        $comment11->setIdUser($commentUser);
        $comment11->setIdArticle($article1);
        $comment11->setMessage("I couldn't agree more with the points made here!");

        $comment12 = new ArticleComment();
        $comment12->setIdUser($commentUser);
        $comment12->setIdArticle($article1);
        $comment12->setMessage("This content is a valuable resource. Thank you!");

        $comment13 = new ArticleComment();
        $comment13->setIdUser($commentUser);
        $comment13->setIdArticle($article1);
        $comment13->setMessage("I'm sharing this article with my friends. It's great!");

        $comment14 = new ArticleComment();
        $comment14->setIdUser($commentUser);
        $comment14->setIdArticle($article1);
        $comment14->setMessage("Your writing style is excellent. I'm a fan!");

        $comment15 = new ArticleComment();
        $comment15->setIdUser($commentUser);
        $comment15->setIdArticle($article1);
        $comment15->setMessage("I look forward to your next post. Well done!");




        $manager->persist($articleAuthor);
        $manager->persist($articleAuthor2);
        $manager->persist($article1);
        $manager->persist($article2);
        $manager->persist($article3);
        $manager->persist($article4);
        $manager->persist($article5);
        $manager->persist($article6);
        $manager->persist($article7);
        $manager->persist($article8);
        $manager->persist($article9);
        $manager->persist($article10);
        $manager->persist($article11);
        $manager->persist($article12);
        $manager->persist($commentUser);

        $manager->persist($comment1);
        $manager->persist($comment2);
        $manager->persist($comment3);
        $manager->persist($comment4);
        $manager->persist($comment5);
        $manager->persist($comment6);
        $manager->persist($comment7);
        $manager->persist($comment8);
        $manager->persist($comment9);
        $manager->persist($comment10);
        $manager->persist($comment11);
        $manager->persist($comment12);
        $manager->persist($comment13);
        $manager->persist($comment14);
        $manager->persist($comment15);

        $manager->flush();
    }
}
