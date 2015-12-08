-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 05 dec 2013 om 18:54
-- Serverversie: 5.5.27
-- PHP-versie: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


DROP DATABASE IF EXISTS `webwinkel`;
CREATE DATABASE IF NOT EXISTS `webwinkel`;
USE `webwinkel`;
-- --------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `webwinkel`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `afbeelding`
--

CREATE TABLE IF NOT EXISTS `afbeelding` (
  `image_id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `image_type` varchar(25) NOT NULL,
  `image` longblob NOT NULL,
  `image_size` varchar(25) NOT NULL,
  `image_ctgy` varchar(25) NOT NULL,
  `image_name` varchar(50) NOT NULL,
  KEY `image_id` (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

-- Auto-increment telt automatisch door, ook wanneer je later records verwijdert.
-- Met de volgende query kun je de automatische telling herstellen.
-- Tellen gaat door na de hoogste waarde in de tabel.
ALTER TABLE `afbeelding` auto_increment=1;

--
-- Gegevens worden uitgevoerd voor tabel `afbeelding`
--

INSERT INTO `afbeelding` (`image_id`, `image_type`, `image`, `image_size`, `image_ctgy`, `image_name`) VALUES
(1, 'image/png', 0x89504e470d0a1a0a0000000d494844520000009d0000009e080600000028b20878000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec400000ec401952b0e1b0000000774494d4507d60a1a0c272e72aebc060000000774455874417574686f7200a9aecc480000000c744558744465736372697074696f6e00130921230000000a74455874436f7079726967687400ac0fcc3a0000000e744558744372656174696f6e2074696d650035f70f090000000974455874536f667477617265005d70ff3a0000000b74455874446973636c61696d657200b7c0b48f00000008744558745761726e696e6700c01be6870000000774455874536f7572636500f5ff83eb0000000874455874436f6d6d656e7400f6cc96bf00000006744558745469746c6500a8eed22700001b5449444154785eed9d09701be775c71f40dc3c018ab715d1a42859b29c58b6235be4a4bee22492a653274e3cbe268d330ed526cd5813c5b193a647a69e8ee3741aa949dd9a53c7493a39aaa6b19d4e28c775122b1e51138f2df990a98394484ae24d02e0859300fabdb7fb010b1027412ec8c5f79b7924b0bbd80b7fbcef7bef3b5617618040a0227af9bf40a01a427402d511a213a88e109d407584e804aa93327ad5e974f22b812077d22545d28a2edd0705825464d28e285e05aa234427501d213a81ea08d1095447884ea03a427402d511a213a88e109d4075447278190c0c0c80cfe3a3d70d4d0d50555545af051299b42344972563636370ecb7bf83e1b15179498cb2f272f848c74760dbb5dbe425c58d10dd0ad0dddd0def9c7a1baa6b36c096b63630994c60b658c0eff341201080f37d7d70796808767774c0debd7be54f152f427479d2d5d505d39353b0bb7d37d4d5d683c55643cbbd1e0ffd47bcbe49181f1f8f0ab3b3b3535e539c08d1e5010a6e7e6e0e6ebded36703836d1b2f0cc2fc0147e0922e129d0e937c0027c1ec2e69b41c75e8d4f8cc1899e13452f3c21ba65a2145c63d387c0eb7e0b0cf37f05b5356f82d9246fc4f0ce1860daf35198883c09368b4d088f214497231830fcea57bfa2d7181c3434b5816bf475b078ee81fa46172df7fb62aa335b02f4ffd2d066180efd104c0607cc7b24e1992d6678e0c107a1bebe9eb6291684e872a0e7f87138f6da3168696e860f5ebf93043776f105a8d23d0475f58138b12582e21b1bb1c344f03f21a86b8189e901387be60c0c0d0cc0c75970514c0186105d169c79ff0c1c7db99b5e5fb36d1b6c6366b76f84e9c1ff80d2c8a350e560de2c9c5a701c2ebc01e7d3ac9ed70eb3f38370e5ca1578ffdd77a1a2b2121e78e0a1a248ab08d1a5c0ed76c3850b17e0adb7dea2ba5b537d036cbe662bb4b6b6b2b565303df00f5003ff0826c76256828ba20f40c06980b3d35f014fc927c0e3f592f030a532313505b51b36c09d1ffd285cbf73a76693ca42740ab0be363c3c0c43838330c80c696645e926664d4d4d60b16c0097eb32185c5f846adbabb43e1ffafa77c305ffa36030dac13bc78e3d364ac5edf8c404addf75f3cd70c30d37d0f1afbefa6a5aa6058a56742830d7b48ba2c9f19151985998278f86ad0795a56550d7d84079377bb59dc4e6f34d817fe46930f9be07950e691fc13c9ba6cdd600b886edd037b90f46e7f7c0ac47cfea851e989b1d03b7cb0943972e413018a46d37d4d642f30736c156e66d31f068611e77bd062045273a2c368f1c39121518b2a1ba1a1c0e07945754d07fabd54a424330320d2ffc0fd8023f8552eb1c18acc9c516f699e55712fe885f7e15c3ac8bdf06315bbcf47fc6592e89cf751dcc063f10159fc7b300b33333e063e29b923d20673313ded7bff9cd75570c179de830bf86dc78e38d9437c316048b35f6a5e9600abcae334c44af8131d40dc6c0db4c6cf24a4648a77893c0b83b0017fb8df2bb182d9b256f85982d61b09ae3876fa218b9f866bd7a18bd780dcc193e08d3ee4698f4b742c06fa07581808b895112338ab1b7b7176ebae9c3f0f5bffe062d5b2f1495e8d0cbfde0b9e7e0965b6e8186c646f2682430ff393084cf33ff75060cbe3fb22de7b2121a8aeccd3f58e1fdff5a00676f106ae5e51c9bfc1f89b49ac0de5a029b3ec3acc900255649649526692b8b8d0524325c808bec9fcbe500a7ab9e44e8f15a61c6b7196602d28f049bdf062f0dc1b7bffded75e5ed8a4a74588ffbe94f7e126d45088c7c8dea6848b6de0c41b1fde1673a78ab4beabec4c586f2a9965ea68789cff6d972d87693174a656526131f472942a4e7dcc37079ee0e56fcb2a087051e070e1e5c57814626ed68aa1327060e588fc362d5e775832efc3a89cd62b392d0b8a5e3c49b11f8eeed7e121c8aad9919ca6523336c7dc5e67e6e57294cb9bcec42083c7fe786370eeba9385e7059c13913019f9f99c740a6c4efb392e1b9619db2cef847a8b085e95a2c164bb4ef9e56d094e830528d310791453778d825fa42ec8bcec2fefbdf82f0d217e6496c682834f46c28b6f2663d04eeb0c064a705469e34905d7aa212aeb0f7136cb96e931eec6c3b342c08518895af78e1ca535e383f108619971e503b283c84c497e41c507c15b629da06a36c93d90c034303f45e2b684a74d8cf0d89402944fc1310f64e491125d6cd33d8cf9f0a45bd1bf76c65ccb0a89c47a1dd6781e95d7a98733011cf4bc7319602946c3443e876334c3f520ee7d9766e263efc3c1a898f79bdc8c159e6f1c230e10c81d3cd828499a024be24e781e82d52b729a3c50c365b29d858dd544b684a74087a07441791beb8c4a22c192ffd6f18cefe62362a38f46cb817f77d3698b85b0f13e521f64ea2aad4088d350670586d4c1091382bdf6a22f10d32cf8728c557f2fc2c8c8deb60d61302b7cf10e7f59428cf1793cad869406b684a74a7df7f5f7ec59c06f372d9708a45a5a79e9a89131cfa151bf358a30edc8f910c41c139aa746031e9a1b2220cf5759138abb03131b2f5e67d26f27abc9b27eeb772300c73cf2c80db5542c2f331d1a5121eb2d13e0015e53aaad761cf642da1394f874512fdd74f43d8b7345254825ff8ebdff52f111cd5cb86c270c70b5205beaa222638b36511ea58115b576d60222b89b3faba3054d9432448f47a58df530a0f8bdae963fe25c20bf8e2737f1639cfc7ab0b5a4353a2e345ab12fc4253d96f5e8950fe0d05810103171c826d1915a392f0fc0bb12fdf6a65c2b3865954c9c491c4507c28c8da2a13d45c6781a18f59e38457fd0b2fabd745c033871e54bafd615d807e004aa3e5217bd26b5aef68ced3e5022f565170f8d58e31819c6186824301a2d531e1ed66f5bde0027bc308fb6375ac32b369896da83491f8aaec8be4f5eaffd40c332cf2e5c2435147de09304fb7086e0f139becedf411539c21dce3690d4d890e1bf5b3e564afd4e317bd0fa263c218d9ac237b83094f090a6feb8fe660c1c98ae440983c54c86b6595fe12798b78507cdceb613d6fee63260a4ca57ec700a56ffac1e3d1819f0514b82f149e92453f97a836d19ca70bca6d97e940b10c1e0bc77939f796980723e1c911280785d7f4efb3e09a08836b16609e1dc7cf749b4978e8f15a6f2e83c956693b149e850515e83951c05e9ff415cce3ce8a044d894e59ff199f94520f8b7ec31243267ae5362706fa35d75633584b4c51f3ed32c3993f2b953690c13a5ed90f920b2f99f8b8f0ac9630845a4d80474469a3850783e4edb098e5753b7e6e4ad07b6bad5ea729d16d6cde445f120e07745457820f967e898ba10809c5200710f875fa58d1ca319706a0ae3642895ff74d8625c2dbc8a2da64c24352090f038ff20e3360e1cf73c03a67245a4f446f9758c482b14e7e215d9796d094e870b43dc71fb051bd0b41a171cb04a64630d18be911b4c09f9490f0627e916dc38487c9de6c85678c58c15e2bdd6aeeedac8bd2b96011cbe1e7c77f2c3a8387fa052aaf4b0b684a7498d7c22fc9e3f3c0a251ea759b4c687e9f1415f23489bf25961231877554f9e786a90f14dea94f5b618ead47431a58bd2c95f01261ce0eec1500d3f2fb4494c2430c212b040c3856439b684a742d34a80645259555a108f6f960f5a760499ca5c2512a09145b1c2a2ca6a8a1f0aa6f35433f139e126c654826bcc4ba99c516a22236910590ea75883267e7f1d7d00f885f078ea1d0129a121d823d6fb1388a2cda406fae9497a6c77c31e6a24aca62e2305b2264243ee6f5b8f0129bb71285b7e065457982f046cf07c9b366039e370edac6ebc0ebc1cea85a4253a2c3812cd8408ec3fe9040a815e683cada580c2b8b2639d60c55bd44e18da4111e267c51783eb685320d327251ea3440c539b34547429776e609174bbcd47487e76d2b2ba5ebc0ebd1da0c019af374d8403ee772d3eba07133fdcf0406069cd07cec96605d8c5b45457ae1f13a9e73c410178da2f0d04cfd52a48c4104b64a040c92e83068d119e22b83fcbcf13af8e0222da139d1614e8bd2262cf2c3b443d8cbdb1ce2b1ee8c257f31616b3f174b2a2756ec39283c4cf626131e82c2c374ca843b006e97212a3cecc059f93b1f79397e365e4535cdac97cec5269f92a37e0b78e617e83a70249bd6d09ce830a785035a68c24216011accd250c3446aaed35334c953189b5ef1827341077e7dacacc5d2d150a28b3365bb6ac39d56129e12f49ad67f9927e1614f12ecb8397ac44fde8d7726c08e9e08a6673068d19bfdb45f890a5888b444d3255a9c7c4773a26b912358f7cc0c458058290f46427186345c65a0115cca842d7a3b4cd80616c330eb8b157906f362d4782b43ada384d2208d1f2f81f1fb50b652cf14344c20d7ffd33c75da5cb81286e69716a2ebd046764715c6ea6c8b60d6495d9b2ce6799867f539aba506e666672988e0d7a32534273a1e4c607d08bb068dce5f03419d178cba92a89559a59488e333f15eaa9e793bbd93459f72c33e0604c9f27c283cb44a7b18aa6c2628bfd318151e079bcc5078a587bd54ac729b6dd0478b56accf21184460d1eaf3974159d3edb4cce9746a32884034273a0427c3c179431643e35051bd8b5a0492d1d6668429b94d9453fe0aabf87b23e4ed3020c0e89747a1264b30ce5028283cec3f87c2eb67c2530a0c3b09a0293973abe4e52a5911adb7b07a9e552ab2b11b939ffd38e6fdbba8196f6a7a9aae438b68527438fb928b790a4c39b8838dcc6b3582de181be780a0b7c386f86d076c54c472b00748e5cfe7607c3842de2eb1a3a512148aa352120d17de7b091e4fc9d9dbf4e06c0a82a52c00a5060b94b3e2bfc21e90038839763e1bc1587e1db8dc4eaa976aadcd95a349d1e1745f01bf9f8ad8c5450b38e1061604f006ac18ac1a4f9168f889ca386f87c2ab7b6a06864f7928efc6870fa61ad380a241e19539fc507abd216e5f9cf32c7838b5dd0256a311cc46698c056dcfc259de5973d1f071b0da6c541f45b65f7b2dfdd71a9a141d4ec1d0ba650b5c1c1c84c5a08ba66a58f09693b7531acfbd61318b23bf7824cbedaa2e1f8d5b7df7bd10090f53205c784a43c6460d30f5bd10b43cb14045ab9271568f7b6b9f85d5dd242f575e260bd4a267f5b67074d4bfbef41ef07926693e3b9cb358b3f3d769695a092538d9e18f9f7f1eda77b7d3fbab4bfe19aa2bcfb17a1ec68ff14ccffaa9fed6d717840ae6e112bf6a4c35cfb796509fb892e60834b6c4da6ffd27001c6f7841c7ea6eb8e744c1a187e382b3db23b0c1ae87da4a3315ab0e8734d98e0dc2e00e5d0fa1eaa3303a728ea6a0bdfbee4faedb593b8b6a2e93441effea57a1caee800db52db0c1740a3e58fb0c5b5a21ad54806da518a962518a2d0a9e1fcfd1c8ad44a4768e185c60987f5b2a65a09e29639b242f964a70d8acaaf3866152f73dd0577e1a4e9d3c06e7ce9e5b7733352929aab94c12b961e70d34eb5124324b53724dcf6c8dcbb971abac0a45d31f8ec645a839504ec30771408d12f4804ae309df44c10db180e1b5276c30b3594762e3826ba867c57982e01097bf9904e7740ed10ca13831a296d1b4a7c3a9c31e7ffc719ae7b7aebe159a2ace91b7339893378d616a04eb6dd892e065de6f66560f33932c3a7dc34f3d51b06380b29d961361753617d349b0de08533b621e120306acbf212838acc3250a0e99f21d26d19d39f3063d75e72fbff4c5755d9f2beae215c149127ff7eaab34bf2f369e7fb8fa5fa1bee1328d7b558229110e060b1838f8234112df5c200073d90f34239462436a1d52d0a0141c4e0f3b3eba19c27527c8cb1d7bed353ac7f5fed093a22e5e917befbd97fe8f8f8ed28c9783f39fa0096c1065a217d316dc3005d2d010a6a2b0ae3148f5b046878984948db53699496c6828b68d8dcc43564a5de0517066161aa385bd0658b41ca49942f1d962985bbcebaebbe8dcb48ce63d1d82deee37478fc2f6eddba998dd55f30c6cfcc03b6c8da236863992047cb3d2f53be5fe790bbee4bd4f12c16214f36fc93c1b07bb4b5d1ebe098c579d8091e177e095977f035897fbd43df7c85bac5f8abe7845b06ef717acc8aab4db6906f38a320f7c62cb61b05526cc219264964cc42df751f2cb6354d381424392890d85c6999d318133f2323be87514b19e3a79120e3ef698267273455fbc22f8457ef6739f83febe3e9a4a3fa26f81be99fbd99a39a604f68f592ac12155160b89088bc84cc647915131cac44626770455e2f67c092cf68f505e0e05870f34d16a323891a2101d82cfe6dac18ad7fe0b17682afdfec95be0f2a50f41a97e69f318a2b7f8e30c4594ce502f6851a1a5101b82c5aaa9f169704ff7d1f4667687036ebb5dea5d520c148de8107c260332363a42d3e7bf3ddb09d3eeb294c253c22bffa98cb6b1c484964c6c887bbc1c16cbbe4f73229f39db0b17ce9f874f7eea53f2dae2a0a844877dd31e7ce82138dddb4b91a24e57016f5fea84051627247ab6acd1b3fa1ab70ce0b361c7c3cf81b5ea46181a7c8f8ad55befb843538f68ca86a2121d82d1e1be7dfba08fd5efb0a52252b60bdeb9f4303545293142386adc9325051f56c72c9567e36097bc51ef37a0bee59314ad9e6482dbb8691315fbc546d1890ef9cac18314c962d186b33c056cf7318f771f098f0b8da337a7bf4554a4ca0f1a4ec7f0e417a0faeabf81d1e13eea8c809e96e7108b8da2141df2ad6f7d0b7c3e1f757f32187c306fbc9f84a7241bc165c3c5e12f80edaa674870af1f7f9d1ec3f9a52f7fb968a2d5448a567458bfc3c0023b0460ff359c363f5cf17978ffdc43b43e93e0b2018b542e388c54df7dfb143d70f86e16386871ec43b614ade810fce2b19d1385808fe7a4f943ec8fc1e92b5f81809bd5e55278b26c8a540c1a869d7f1b27b893a74ec2671f7e981e9657cc14458b4426b08e75e4673fa3ae5038be02e74109cc1e87ab1d5f83fa463e696bf6605ac4094f83adfe110a1afacf9e23c1dd7bfffd452138d10c9625f81cff175f7c81ba89efb8f65a9ac066de33062de55f83da9a373346a71c4cfc621e0ed322283814347ad262f270427439804f517cfeb91fb0a2d34c8f392fb349f5aef0dc0f61eb5587a0a23275918ac5e9e8fc7ed057ff3dbdc73c1ca645304afdfc238f14552e4e886e1960af141c02f8a19dd7435d5d1d8db80fcebd070ed3f7a1a6fae538af87c1c2c4e44d102a7d9a1aefb15f1c76533a71fc38356f3df0e08345173408d12d93d77eff7bf8edabaf5202178b5b7b95f4607f9dff3418c3ff0726fd6508843742507f1784cd37d3ba89890bf448254c89ec649e520bdd949683105d1e0c0c0cc00bbffc25cd29c2bd1e829e4f89db7d998a661c5083ace7915c2b8110dd0ac0bd1e169738d5033e7fcc62b582cfeba5160d4c30e333f78bd9bb2911a25b21b023684f4f0f2592710a2f25cdcdcdd0ded151d4095f25427402d5c9a49da26e91101406213a81ea08d1095447884ea03a427402d511a213a88e109d407584e804aa234427501d213a81ea08d1095447884ea03a427402d55925d1f5c3e10e1df536d0751c66ef1251acdf7f74e9b2a49f590d0a714c25853e7e61109e4ea03a6b48749be1d1e311ea871539fe287ba7068538a692421fbf30ac21d1a52f6a8eee97d7718b16cb31fa0f77c8eb3be0f0d1c3d011dd9ebd4f5a76e57fcc7464fe7c2ec797ae21b66c3f24ee2de77b14b7bfd8b2d5661d14af47613fbb217bbbe4b79caebdec262dbdf1123d7060ef01f657a6fd5ed897931b59ce3195e4fb79498cf19f67d7d4d6014f9e96dfc6b1cc7bd496fc18ab2dbcd5175dcf0168a35f91d2dae0405411e939ba7f2f48f7a513bab11822eb66ef902e7832d51d6a3f047d7cfb1c8bae651f5326dfcfc3d1efc4ee4f67b7fcf9087477f6404f92fbb6fce3c5b6ef3b243d430d8577e4d7abac3a76c0a4a45995057d11760db48f8cd6c92e3bf133ed87d83ba43bc26e1c2d6b3f242de1b09b24efa3936d95b80c22d1dda625ff632e2597cf273b3edb43a7bc6cc97162fb8ead5ba17bd47728c26427adcbeee6a504f7918eb55dbcf69f075e9af41c688bf3966d5157701ace2ff961b6c3f636f965ae2cfb9832f97e9e15ade7f90edab743fc65ec81bb99c2e258a97bb4790bec905fae36ab2f3a653117b53e887af374f4f5c6ea656a91ef31f33ee73ee8e53bd8b12573b5a010f7284fd6b6a76bdbce7e8f12cce3270897db71787425730df91e33ef736e83ed7c07a7cf2f89689750887b94276b5b740a97dff562e6986f45c8f798799ff366d8c277d0d3cbfc9e92a3f0625cb4c928c43dca93b52d3a651d8685ffb1b4939422a0bacb8a371fe57bccfccf794f6c07b057916b8b45a94a0a718ff2638d8b8eddd26779e88ff754be893a7ef3dbe1d08f563e939fef31f33ee73d8fc5eabc946b93f6b1b7ab1ddaf9720585b847f9b0e645c76e293c9b2cf0a00065b5ea2af91e33dfcf4bcd63dd5c4904e6d48ec33779591a4721ee511eb08a6652d2acd2108a3c599eb929b588e6f01479bdb54626edac034fb79a28d2136b08657b6887b235a1ff303cc92b75d9a453d62ab2f896906695268865fd254bcce61794eeceb8735b6aed91b574ba89e039a6a3483d9d22eb8f7476c3f1b554f1d9f32cfbd662c1411c6bb59e9603627e3ac18a93493b455ea7131402213a81ea08d1095467dd892e5997ec745db8d523f7915d4bcf3bf77dac47d697e88eee5fd225bb7dd91de70485625d89ae3fd6bb110ef549dd76d654aa236f8a6374d8da105dbf72e416b7f801225814c57ac24a834a928f5e52f4ae404b534c252baa5391cbb6c988ff7caac12fc98bd7e58ee04ab65d6c5901ab22ec57959434ab5696b4d9f758e63db10541b93ef93aa5a51b6b9068cbdd36f97887b8e5298def27f93e94e31a925b620b45aa63b647daa3cb13af73e5c0fda7a3c0a24bd1e0ae1824a26c9e8addfcf89b1c273ae517ae14b462ffb1ed95373ef90097ecb74d21ba8ce780968be862e7a15c1ed78c97d331571edc7f3a0a2cbaa52cf9552b6e5a66d125fee295ebf84dce65f4542edb26174c72d1224a0f9a7e1fca7ba2fc6db215494770e576cc9507f79f8e3550a753d46398c5ea6dcb61076c49a87db7c5061c4823a272193db59223bb3aef863df24b892423bb3292cd08ae1c47931580028b0e05173ff09afd60d9cf244563772696dce424e4327a6a254776a9468ea3c90a406145d7ff6b3822df20567ca14f8667e3dd416e2c19c892845c464fa93db26b4528c43173a3b0a25378921dca725151ace596fced82c401517db19fbd54f4e6327a4aed915d2b42218e991b85159dc293743dc9f352acc8fdf3d8e4373dbd197d571c5d7b15f927650b46b44e95cbe829b54776ad0c8538664eb02222296956ad208a682d9529a2b2ccd16b2a4b17c5255a62049cedb62952268ceccf2f53f49ae6dc14f729f57d5d1b79ba020712d8ec93388a496ae262375a7adbf562cc736504474c250421d4d3f659d9cb7172193d95ff48ab3dcf268eec6267caea8889cb568e5c4793a98be8395c646033185539f047b34aedbb99b453604f27580d946dae6b713499f0745a840550ba25d3722ac12accea0dee119eae1859e3a3c984a713ac38c2d309d61c427402d511a213a88e109d407584e804aa234427501d213a81ea08d1095447884ea03a427402d511a213a84edab6578160b9a46b7b4d293a8160b510c5ab407584e804aa234427501d213a81ea08d1095447884ea03a4274029501f87f4ec6886fad2e23e90000000049454e44ae426082, 'width="157" height="158"', '', 'imageNotFound.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelling`
--

CREATE TABLE IF NOT EXISTS `bestelling` (
  `bestelnummer` int(10) NOT NULL AUTO_INCREMENT,
  `klantnummer` int(6) NOT NULL,
  `besteldatum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('open','betaald','verzonden') DEFAULT 'open',
  `totaalprijs` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`bestelnummer`,`klantnummer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Gegevens worden uitgevoerd voor tabel `bestelling`
--

INSERT INTO `bestelling` (`bestelnummer`, `klantnummer`, `besteldatum`, `status`, `totaalprijs`) VALUES
(1, 6, '2013-12-03 09:02:39', 'open', NULL),
(2, 6, '2013-12-03 09:14:44', 'open', NULL),
(3, 6, '2013-12-04 14:33:28', 'open', NULL),
(4, 6, '2013-12-04 20:27:48', 'open', NULL),
(5, 1, '2013-12-05 15:43:21', 'open', NULL),
(6, 1, '2013-12-05 15:44:06', 'open', NULL),
(7, 1, '2013-12-05 15:44:45', 'open', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelregel`
--

CREATE TABLE IF NOT EXISTS `bestelregel` (
  `bestelnummer` int(10) NOT NULL,
  `productnummer` int(10) NOT NULL,
  `productprijs` decimal(5,2) NOT NULL,
  `aantal_besteld` int(3) NOT NULL,
  PRIMARY KEY (`bestelnummer`,`productnummer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `bestelregel`
--

INSERT INTO `bestelregel` (`bestelnummer`, `productnummer`, `productprijs`, `aantal_besteld`) VALUES
(1, 111, 0.00, 13),
(2, 111, 0.00, 3),
(2, 333, 0.00, 2),
(2, 444, 0.00, 1),
(3, 111, 0.00, 1),
(4, 111, 0.00, 2),
(4, 444, 0.00, 1),
(5, 444, 0.00, 1),
(5, 888, 0.00, 1),
(6, 111, 0.00, 1),
(6, 666, 0.00, 1),
(7, 111, 0.00, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE IF NOT EXISTS `klant` (
  `klantnr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naam` varchar(50) NOT NULL,
  `adres` varchar(40) NOT NULL,
  `postcode` varchar(7) NOT NULL,
  `plaats` varchar(40) NOT NULL,
  `emailadres` varchar(60) NOT NULL,
  `password` char(40) NOT NULL,
  PRIMARY KEY (`emailadres`),
  KEY `klantnr` (`klantnr`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Gegevens worden uitgevoerd voor tabel `klant`
--

INSERT INTO `klant` (`klantnr`, `naam`, `adres`, `postcode`, `plaats`, `emailadres`, `password`) VALUES
(1, 'Marieke Dillenburg', 'Koningsweg 34', '2351GF', 'Durgerdam', 'm.dillenburg@mail.nl', 'test'),
(2, 'Mark Dijkman', 'Koningsweg 34', '2351GF', 'Durgerdam', 'mark.dijkman@mail.nl', 'test'),
(3, 'Sjaak van Dam', 'Koningsweg 34', '2351GF', 'Durgerdam', 'svd@mail.nl', 'test'),
(6, 'Test', 'testtest 56', '1234rt', 'Testtest', 'test@test.nl', 'test');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productnummer` int(10) NOT NULL,
  `productnaam` varchar(30) NOT NULL,
  `prijs` decimal(5,2) NOT NULL,
  `beschrijving` varchar(9999) NOT NULL,
  `leverbaar` enum('ja','nee') DEFAULT NULL,
  `voorraad` int(5) NOT NULL,
  PRIMARY KEY (`productnummer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `product`
--

INSERT INTO `product` (`productnummer`, `productnaam`, `prijs`, `beschrijving`, `leverbaar`, `voorraad`) VALUES
(111, 'Product 1', 299.95, 'Hier de beschrijving van dit product.', 'ja', 12),
(222, 'Product 2', 399.95, 'Hier de beschrijving van dit product.', 'ja', 24),
(333, 'Product 3', 249.95, 'Hier de beschrijving van dit product.', 'ja', 124);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_afbeelding`
--

CREATE TABLE IF NOT EXISTS `product_afbeelding` (
  `productnummer` int(10) NOT NULL,
  `image_id` tinyint(3) NOT NULL,
  PRIMARY KEY (`productnummer`,`image_id`),
  KEY `fk_afbeelding` (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `product_afbeelding`
--

INSERT INTO `product_afbeelding` (`productnummer`, `image_id`) VALUES
(111, 1),
(222, 1),
(333, 1);

--
-- Beperkingen voor gedumpte tabellen
--

--
-- Beperkingen voor tabel `product_afbeelding`
--
ALTER TABLE `product_afbeelding`
  ADD CONSTRAINT `product_afbeelding_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `afbeelding` (`image_id`) ON UPDATE CASCADE;


--
-- Trigger, zorgt dat bij een voorraad van 0 producten `leverbaar` op 'nee' gezet wordt.
--
DROP TRIGGER IF EXISTS `valideerVoorraad`;
DELIMITER //
CREATE TRIGGER `valideerVoorraad` 
BEFORE UPDATE ON `product`
FOR EACH ROW 
BEGIN 
	IF NEW.voorraad = 0 THEN
	SET NEW.`leverbaar` = 'nee';
	END IF;
END //
DELIMITER ;


