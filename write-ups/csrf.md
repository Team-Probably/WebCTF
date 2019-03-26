## CSRF Challenge 
**Points:** 300

**Description:**
The admin of this banking website is a very rich guy who loves reading feedback.
Little does he know that he is about to be the target of the biggest online bank heist in history!

## Write Up
This challenge is based upon a simple ( and vulnerable ) money transfer website that can transfer money from one user to another using user id of the receipient. The flag is listed a premium service that worth Rs. 1000. 

The catch here is that each user starts with a balance of 0, except admin who is "very rich". It is also mentioned that the he frequently checks the feedback section.
The objective is to somehow steal money from the admin  and then purchase the flag.

### Vulnerability
A few quick observations will lead you to the answer.

We observe that the form uses GET to submit and has a csrf token as hidden input. This csrf token is also set in a cookie.

We have no knowledge of the admin's id. But we know that he checks the feedback section frequently. So that is one way of reaching the him. Heading over to the feedback section, we see that we can enter some text and after submitting, it shows what we just submitted. What if we submit something like &lt;b&gt;Hi&lt;/b&gt; ? The text appears in bold! The feedback section is vulnerable to XSS!
Anything that a user submits within &lt;script&gt; will be executed by the admin's browser. 

We can use this to perform a request forgery and submit the money transfer form riding on the admin's session with our id as the receipient

### Exploit

```js
<script>
var csrftoken = document.cookie.split('=')[1];
fetch("/transfer?userid=<myid>&amount=1000&csrf_token="+csrftoken);
</script>
```

Go back to the main page and et-voila! We see that our balance just increased by Rs. 1000!

### Flag
flag{g1ve_m3_my_mon3y_b4ck}