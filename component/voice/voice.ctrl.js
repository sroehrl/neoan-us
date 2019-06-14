
if (annyang) {
    // Let's define our first command. First the text we expect, and then the function it should call
    let commands = {
        'start training': function() {
            say('Welcome to voice-led training. Imagine your workforce being able to not only learn while being on the road, but also using their voice in order to fulfill learning objectives required for compliance or success enhancement. ' +
                'Imagine not hearing my synthesized voice but one of Eagle\'s  voice talents in combination with important points or graphics on a user\'s phone, laptop or desktop. '  +
                'Do you want to try it out? Say yes or no.')
        },
        'yes':function(){
            say('Good! Let me try to identify you. Can you say "I am", followed by your name?')
        },
        'no':function(){
            say('Maybe another time. You may restart at any time by saying "Start training".')
        },
        'I am *name':function(name){
            say('Hello, '+name+'. Depending on your company, I would normally look up who you are. For now, let me ask you a question. How many days are in a week?')
        },
        'seven':function(){
            document.querySelector('#done').style.display = 'block';
            say('Correct. You have mastered this course.')
        }
    };

    // Add our commands to annyang
    annyang.addCommands(commands);

    // Start listening. You can call this here, or attach this call to an event, button, etc.
    annyang.start();
}
let speak = window.speechSynthesis;
let voices = speak.getVoices();
function say(msg){
    let speaker = new SpeechSynthesisUtterance(msg);
    speaker.voice = voices[0];
    speak.speak(speaker);
}
function allow(){
    say('You may start anytime by saying "start training".')
}
