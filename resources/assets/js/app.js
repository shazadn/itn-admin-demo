
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh application object and attach it to
 * the window. Then, you may begin adding properties to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import HttpRequest from './classes/HttpRequest';

const app = window.app = {
    
    /**
     * This property is an object which holds HttpRequest instance for sending
     * HTTP requests in the application.
     * 
     * @property Object
     */
    http: new HttpRequest(),
    
    /**
     * This property is an object which holds the viewport information of the
     * application.
     * 
     * @property Object
     */
    viewport: {
        
        /**
         * This property is used to determine if the application viewport is a
         * mobile viewport or not.
         * 
         * @property boolean
         */
        isMobile: false,
        
        /**
         * This property is used to determine if the application viewport is a
         * tablet viewport or not.
         * 
         * @property boolean
         */
        isTablet: false,
        
        /**
         * This property is an object which has the avaialble devices and their
         * viewport size.
         * 
         * @property Object
         */
        width: {
            
            /**
             * This property has the maximum viewport size of a mobile device.
             * 
             * @property int
             */
            mobile: 768,
            
            /**
             * This property has the maximum viewport size of a tablet device.
             * 
             * @property int
             */
            tablet: 992,
            
            /**
             * This property has the maximum viewport size of a desktop device.
             * 
             * @property int
             */
            desktop: 1200
            
        }
        
    },
    
    /**
     * This property is an object which holds the device information of the
     * application.
     * 
     * @property Object
     */
    device: {
        
        /**
         * This property has the name of the browser which is used to run the
         * application.
         * 
         * @property string
         */
        browser: null,
        
        /**
         * This property has the name of the browser version which is used to
         * run the application.
         * 
         * @property int
         */
        version: null,
        
        /**
         * This property has the name of the operating system which is used to
         * run the application.
         * 
         * @property string
         */
        OS: null
        
    },
    
    /**
     * This property is an object which has the global settings for the ajax
     * requests trigger by the application.
     * 
     * @property Object
     */
    ajaxSetup: {
        
        /**
         * This property is used to set the cache property of ajax request
         * trigger by the application.
         * 
         * @property boolean
         */
        cache: false
        
    },
    
    /**
     * This property is an object which has all the methods used by the
     * application.
     * 
     * @property Object
     */
    functions: {},
    
    /**
     * This property is a function which is called to start the entire execution
     * of Javascript application.
     * 
     * @property Function
     * @returns void
     */
    run() {
        const app = this;
        $(() => {
            $.ajaxSetup(app.ajaxSetup);
            Object.keys(app.functions).forEach((key) => {
                const fn = app.functions[key];
                if (typeof fn.onDomReady !== "undefined" && 
                        fn.onDomReady === true && 
                        typeof fn.init === "function") {
                    fn.init();
                }
            });
        });
    }
    
};

/**
 * Next, we will load all of this project's JavaScript files required by the
 * application.
 */

let req = require.context('./app', true, /\.js$/);
req.keys().forEach(req);
