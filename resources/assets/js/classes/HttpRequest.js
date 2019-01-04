/* 
 * This is an abstract class which handles the http request triggered by the
 * application.
 */

export default class HttpRequest {
    
    get(endPoint, data, config) {
        return this.send(endPoint, 'GET', data, config);
    }
    
    post(endPoint, data, config) {
        return this.send(endPoint, 'POST', data, config);
    }
    
    patch(endPoint, data, config) {
        return this.send(endPoint, 'PATCH', data, config);
    }
    
    put(endPoint, data, config) {
        return this.send(endPoint, 'PUT', data, config);
    }
    
    deleteRequest(endPoint, data, config) {
        return this.send(endPoint, 'DELETE', data, config);
    }
    
    send(endPoint, method, data, config) {
        return this._makeRequest(endPoint, method, data, config);
    }
    
    _makeRequest(endPoint, method, data, config) {
        return new Promise((resolve, reject) => {
            axios(this._getAxiosConfig(endPoint, method, data, config))
                .then(response => {
                    resolve(response.data);
                }, (error) => {
                    reject(this._handleError(error.response));
                });
        });
    }
    
    _getAxiosConfig(endPoint, method, data, config) {
        let axiosConfig = {...config, method: method, url: endPoint};
        if (method === 'POST' || method === 'PATCH' || method === 'PUT') {
            axiosConfig.data = data;
        } else {
            axiosConfig.params = data;
        }
        
        return axiosConfig;
    }

    _handleError(error) {
        if (error && error.status !== 422) {
            alert(error.data.message || 'There is an error processing this request.');
        } else if (error && error.status === 422) {
            this._handleValidationErrors(error);
        }
        
        return error;
    }
    
    _handleValidationErrors(error) {
        const originalErrors = error.data.errors,
              transformedErrors = [];
        Object.keys(originalErrors).forEach((key) => {
            const fieldErrors = originalErrors[key];
            if (fieldErrors instanceof Array) {
                fieldErrors.forEach((fieldError) => {
                    transformedErrors.push(fieldError);
                });
            } else {
                transformedErrors.push(fieldErrors);
            }
        });
    }
}
