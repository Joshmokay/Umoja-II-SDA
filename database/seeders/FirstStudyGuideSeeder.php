<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudyGuide;
use Illuminate\Support\Str;

class FirstStudyGuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = <<<HTML
<p>Death just might be one of the most misunderstood subjects today. For many, death is shrouded in mystery and evokes dread, uncertainty, and hopelessness. Others believe that their deceased loved ones are not dead at all, but instead live with them or in other realms.</p>
<p>Millions are confused about the relationship between the body, spirit, and soul. But does it really matter what you believe? Yes — absolutely! What you believe about the dead will have a profound impact on what happens to you in the near future.</p>
<p>There’s no room for guessing! This Study Guide will give you exactly what God says on this subject. Get ready for a real eye-opener!</p>

<h3>1. How did humans get here in the first place?</h3>
<blockquote>The Lord God formed man of the dust of the ground, and breathed into his nostrils the breath of life; and man became a living being (Genesis 2:7).</blockquote>
<p><strong>Answer:</strong> God made us from dust in the beginning.</p>

<h3>2. What happens when a person dies?</h3>
<blockquote>Then the dust will return to the earth as it was, and the spirit will return to God who gave it (Ecclesiastes 12:7).</blockquote>
<p><strong>Answer:</strong> The body turns to dust again, and the spirit goes back to God, who gave it. The spirit of every person who dies — whether saved or unsaved — returns to God at death.</p>

<h3>3. What is the spirit that returns to God at death?</h3>
<blockquote>The body without the spirit is dead (James 2:26).<br><br>The spirit of God is in my nostrils (Job 27:3 KJV).</blockquote>
<p><strong>Answer:</strong> The spirit that returns to God at death is the breath of life. Nowhere in all of God’s book does the spirit have any life, wisdom, or feeling after a person dies. It is the “breath of life” and nothing more.</p>

<h3>4. What is a “soul”?</h3>
<blockquote>The Lord God formed man of the dust of the ground, and breathed into his nostrils the breath of life; and man became a living soul (Genesis 2:7 KJV).</blockquote>
<p><strong>Answer:</strong> A soul is a living being. A soul is always a combination of two things: body plus breath. A soul cannot exist unless body and breath are combined. God’s Word teaches that we are souls, not that we have souls.</p>

<h3>5. Do souls die?</h3>
<blockquote>The soul that sinneth, it shall die (Ezekiel 18:20 KJV).<br><br>Every living soul died in the sea (Revelation 16:3 KJV).</blockquote>
<p><strong>Answer:</strong> According to God’s Word, souls do die! We are souls, and souls die. Man is mortal (Job 4:17).</p>
<p>Only God is immortal (1 Timothy 6:15, 16). The concept of an undying, immortal soul is not found in the Bible, which teaches that souls are subject to death.</p>

<h3>6. Do good people go to heaven when they die?</h3>
<blockquote>All who are in the graves will hear His voice and come forth (John 5:28, 29).<br><br>David … is both dead and buried, and his tomb is with us to this day. For David did not ascend into the heavens (Acts 2:29, 34).<br><br>If I wait, the grave is mine house (Job 17:13 KJV).</blockquote>
<p><strong>Answer:</strong> No. People do not go to heaven or to hell at death. They don’t go anywhere, but they wait in their graves for the resurrection.</p>

<h3>7. How much does one know or comprehend after death?</h3>
<blockquote>The living know that they will die; but the dead know nothing, and they have no more reward, for the memory of them is forgotten. Also their love, their hatred, and their envy have now perished; nevermore will they have a share in anything done under the sun. There is no work or device or knowledge or wisdom in the grave where you are going (Ecclesiastes 9:5, 6, 10).<br><br>The dead do not praise the Lord (Psalm 115:17).</blockquote>
<p><strong>Answer:</strong> God says that the dead know absolutely nothing!</p>

<h3>8. But can’t the dead communicate with the living, and aren’t they aware of what the living are doing?</h3>
<blockquote>Man lies down and does not rise. Till the heavens are no more, they will not awake nor be roused from their sleep. … His sons come to honor, and he does not know it; they are brought low, and he does not perceive it (Job 14:12, 21).<br><br>Nevermore will they have a share in anything done under the sun (Ecclesiastes 9:6).</blockquote>
<p><strong>Answer:</strong> No. The dead cannot contact the living, nor do they know what the living are doing. They are dead. Their thoughts have perished (Psalm 146:4 KJV).</p>

<h3>9. Jesus called the unconscious state of the dead “sleep” in John 11:11–14. How long will they sleep?</h3>
<blockquote>Man lies down and does not rise. Till the heavens are no more (Job 14:12).<br><br>The day of the Lord will come in which the heavens will pass away (2 Peter 3:10).</blockquote>
<p><strong>Answer:</strong> The dead will sleep until the great day of the Lord at the end of the world. In death humans are totally unconscious with no activity or knowledge of any kind.</p>

<h3>10. What happens to the righteous dead at the second coming of Christ?</h3>
<blockquote>Behold, I am coming quickly, and My reward is with Me, to give to every one according to his work (Revelation 22:12).<br><br>The Lord Himself will descend from heaven with a shout. … And the dead in Christ will rise. … And thus we shall always be with the Lord (1 Thessalonians 4:16, 17).<br><br>We shall all be changed — in a moment, in the twinkling of an eye … and the dead will be raised incorruptible. … For this corruptible must put on incorruption, and this mortal must put on immortality (1 Corinthians 15:51–53).</blockquote>
<p><strong>Answer:</strong> They will be rewarded. They will be raised, given immortal bodies, and caught up to meet the Lord in the air. There would be no purpose in a resurrection if people were taken to heaven at death.</p>

<h3>11. What was the devil’s first lie on Earth?</h3>
<blockquote>The serpent said to the woman, ‘You will not surely die’ (Genesis 3:4).<br><br>That serpent of old, called the Devil and Satan (Revelation 12:9).</blockquote>
<p><strong>Answer:</strong> You will not die.</p>

<h3>12. Why did the devil lie to Eve about death? Could this subject be more important than we think?</h3>
<p><strong>Answer:</strong> The devil’s lie that we will not die is one of the pillars of his teachings. For thousands of years, he has worked powerful, deceptive miracles to trick people into thinking they are receiving messages from the spirits of the dead. (Examples: Magicians of Egypt Exodus 7:11; Woman of Endor 1 Samuel 28:3–25; Sorcerers Daniel 2:2; A slave girl Acts 16:16–18.)</p>
<h4>A Solemn Warning</h4>
<p>In the near future, Satan will again use sorcery — as he did in the prophet Daniel’s day — to deceive the world (Revelation 18:23). Sorcery is a supernatural agency that claims to receive its power and wisdom from the spirits of the dead.</p>
<h4>Posing as Jesus’ Disciples</h4>
<p>Posing as godly loved ones who have died, saintly clergymen who are now dead, Bible prophets, or even the apostles of Christ (2 Corinthians 11:13), Satan and his angels will deceive billions. Those who believe the dead are alive, in any form, will likely be deceived.</p>

<h3>13. Do devils really work miracles?</h3>
<blockquote>For they are the spirits of devils, working miracles (Revelation 16:14, KJV).<br><br>False christs and false prophets will rise and show great signs and wonders to deceive, if possible, even the elect (Matthew 24:24).</blockquote>
<p><strong>Answer:</strong> Yes indeed! Devils work incredibly convincing miracles (Revelation 13:13, 14). Satan will appear as an angel of light (2 Corinthians 11:14) and, even more shocking, as Christ Himself (Matthew 24:23, 24). The universal feeling will be that Christ and His angels are leading out in a fantastic worldwide revival. The entire emphasis will seem so spiritual and be so supernatural that only God’s elect will not be deceived.</p>

<h3>14. Why will God’s people not be deceived?</h3>
<blockquote>They received the word with all readiness, and searched the Scriptures daily to find out whether these things were so (Acts 17:11).<br><br>If they do not speak according to this word, it is because there is no light in them (Isaiah 8:20).</blockquote>
<p><strong>Answer:</strong> God’s people will know from their study of His book that the dead are dead, not alive. They will know that a spirit claiming to be a deceased loved one is really a devil! God’s people will reject all teachers and miracle workers who claim to receive special light or work miracles by contacting the spirits of the dead. And God’s people will likewise reject as dangerous and false all teachings that claim the dead are alive in any form, anywhere.</p>

<h3>15. Back in Moses’ day, what did God command should be done to people who taught that the dead were alive?</h3>
<blockquote>A man or a woman who is a medium, or who has familiar spirits, shall surely be put to death; they shall stone them with stones (Leviticus 20:27).</blockquote>
<p><strong>Answer:</strong> God insisted that mediums and others with “familiar spirits” (who claimed to be able to contact the dead) should be stoned to death. This shows how God regards the false teaching that the dead are alive.</p>

<h3>16. Will the righteous people who are raised in the resurrection ever die again?</h3>
<blockquote>Those who are counted worthy to attain that age, and the resurrection from the dead … nor can they die anymore (Luke 20:35, 36).<br><br>God will wipe away every tear from their eyes; there shall be no more death, nor sorrow, nor crying. There shall be no more pain, for the former things have passed away (Revelation 21:4).</blockquote>
<p><strong>Answer:</strong> No! Death, sorrow, crying, and tragedy will never enter into God’s new kingdom. When this corruptible has put on incorruption, and this mortal has put on immortality, then shall be brought to pass the saying that is written: ‘Death is swallowed up in victory’ (1 Corinthians 15:54).</p>

<h3>17. Belief in reincarnation is expanding rapidly today. Is this teaching biblical?</h3>
<blockquote>The living know that they will die; but the dead know nothing. … Nevermore will they have a share in anything done under the sun (Ecclesiastes 9:5, 6).</blockquote>
<p><strong>Answer:</strong> Almost half the people on earth believe in reincarnation, a teaching that the soul never dies but is instead continually reborn in a different kind of body with each succeeding generation. This teaching, however, is contrary to Scripture.</p>
<h4>The Bible Says</h4>
<p>After death a person: returns to dust (Psalms 104:29), knows nothing (Ecclesiastes 9:5), possesses no mental powers (Psalms 146:4), has nothing to do with anything on earth (Ecclesiastes 9:6), does not live (2 Kings 20:1), waits in the grave (Job 17:13), and continues not (Job 14:1, 2).</p>
<h4>Satan’s Invention</h4>
<p>We learned in questions 11 and 12 that Satan invented the teaching that the dead are alive. Reincarnation, channeling, communication with spirits, spirit worship, and the “undying soul” are all inventions of Satan, with one aim to convince people that when you die you are not really dead. When people believe that the dead are alive, “spirits of devils, working miracles” (Revelation 16:14) and posing as spirits of the dead will be able to deceive and lead them astray virtually 100 percent of the time (Matthew 24:24).</p>

<h3>18. Are you thankful for the Bible, which tells us the truth on this sensitive subject of death?</h3>
<p><strong>Answer:</strong> Request your free downloadable copy of The Rich Man and Lazarus Download</p>

<h2>Thought Questions</h2>

<p><strong>1. Didn’t the thief on the cross go to paradise with Christ the day He died?</strong><br>
No. In fact, on Sunday morning Jesus said to Mary, I have not yet ascended to My Father (John 20:17). This shows that Christ did not go to heaven at death. It’s important to note that the punctuation we see in the Bible today is not original, but added centuries later by translators. The comma in Luke 23:43 would be better placed after the word today rather than before, so that the passage reads, Assuredly, I say to you today, you will be with Me in Paradise. Another way to put this verse that makes sense in the immediate context is: I’m telling you today, when it seems that I can save no one, when I Myself am being crucified as a criminal, give you the assurance today that you will be with me in Paradise. Christ’s kingdom of glory will be set up at His second coming (Matthew 25:31), and the righteous of all ages will enter it at that time (1 Thessalonians 4:15–17) and not at death.</p>

<p><strong>2. Doesn’t the Bible speak of the undying, immortal soul?</strong><br>
No. The undying, immortal soul is not mentioned in the Bible. The word “immortal” is found only once in the Bible, and it is in reference to God (1 Timothy 1:17).</p>

<p><strong>3. At death the body returns to dust and the spirit (or breath) returns to God. But where does the soul go?</strong><br>
It goes nowhere. Instead, it simply ceases to exist. Two things must be combined to make a soul: body and breath. When the breath departs, the soul ceases to exist because it is a combination of two things. When you turn off a light, where does the light go? It doesn’t go anywhere. It just ceases to exist. Two things must combine to make a light: a bulb and electricity. Without the combination, a light is impossible. So with the soul; unless body and breath are combined, there can be no soul. There is no such thing as a “disembodied soul.”</p>

<p><strong>4. Does the word “soul” ever mean anything other than a living being?</strong><br>
Yes. It may mean also (1) life itself, or (2) the mind, or intellect. No matter which meaning is intended, the soul is still a combination of two things (body and breath), and it ceases to exist at death.</p>

<p><strong>5. Can you explain John 11:26: Whoever lives and believes in Me shall never die?</strong><br>
This refers not to the first death, which all people die (Hebrews 9:27), but to the second death, which only the wicked die and from which there is no resurrection (Revelation 2:11; 21:8).</p>

<p><strong>6. Matthew 10:28 says, Do not fear those who kill the body but cannot kill the soul. Doesn’t this prove that the soul is undying?</strong><br>
No. It proves the opposite. The last half of the same verse proves that souls do die. It says, Rather fear Him who is able to destroy both soul and body in hell. The word soul here means life and refers to eternal life, which is a gift (Romans 6:23) that will be given to the righteous at the last day (John 6:54). No one can take away the eternal life that God bestows. (See also Luke 12:4, 5.)</p>

<p><strong>7. Doesn’t 1 Peter 4:6 say the gospel was preached to dead people?</strong><br>
No. It says the gospel was preached to those who are dead. They are dead now, but the gospel was preached to them while they were yet living.</p>
HTML;

        StudyGuide::create([
            'title' => 'ARE THE DEAD REALLY DEAD?',
            'slug' => 'are-the-dead-really-dead-' . uniqid(),
            'description' => 'Death just might be one of the most misunderstood subjects today. For many, death is shrouded in mystery and evokes dread, uncertainty, and hopelessness. This Study Guide will give you exactly what God says on this subject.',
            'content' => $content,
            'author' => 'Pastoral Team',
            'category' => 'Bible Study',
            'is_published' => true,
        ]);
    }
}
