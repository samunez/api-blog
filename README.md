# PHP blog API

Proyecto basado en el diseño DDD

## Endpoints

    `GET: /api/posts`
    `POST: /api/posts`

 **POST request example** 

```
{    
    "title": "Test title",
    "body": "Test body",
    "author_id": "b86d9c16-dce8-4b57-be04-383532385b87"
}
```

**POST Response example**

```
{
    "status": "ok",
    "message": {
        "id": "a497c002-a508-48e0-a648-b3cb517e9494",
        "title": "Test title",
        "body": "Test body",
        "author": {
            "id": "b86d9c16-dce8-4b57-be04-383532385b87",
            "name": "Pedro Ramirez"
        }
    }
}
```

     
