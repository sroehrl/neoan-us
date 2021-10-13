export class GDPR extends HTMLElement {
    constructor() {
        super();
        this.attachShadow({mode: 'open'});
        this.shadowRoot.innerHTML = 'Loading...';
        if(!localStorage.gdprAccepted){
            this.render()
        } else {
            this.attachGoogle();
        }

    }
    render(){
        const template = document.querySelector('#gdpr').content;
        template.querySelector('#accept-gdpr-button').addEventListener('click', ev => {
            localStorage.gdprAccepted = true;
            this.shadowRoot.innerHTML = '';
            this.attachGoogle();
        })
        const userDeclinedElement = template.querySelector('#gdpr-declined');
        template.querySelector('#decline-gdpr-button').addEventListener('click', ev => {
            userDeclinedElement.style.display = 'block';
        })
        this.shadowRoot.appendChild(template);
    }
    attachGoogle(){
        const include = document.createElement('script');
        include.src = 'https://www.googletagmanager.com/gtag/js?id={{trackingId}}';
        const script = document.createElement('script');
        script.innerText = `
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
        
            gtag('config', '{{trackingId}}');
        `;
        document.querySelector('head').append(include)
        document.querySelector('head').append(script)
        this.shadowRoot.innerHTML = '<span style="display:none">GDPR accepted</span>';
    }
}
customElements.define('gdpr-consent', GDPR)


