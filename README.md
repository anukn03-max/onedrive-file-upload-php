## Azure App Registration Setup

Follow the steps below to configure Microsoft Azure App Registration for OneDrive JavaScript Picker integration.

### Step 1: Open Azure App Registrations

Log in using your Microsoft account or work/school account:

https://portal.azure.com/#blade/Microsoft_AAD_RegisteredApps/ApplicationsListBlade

---

### Step 2: Create a New App

1. Click **New Registration**
2. Enter your application name
3. Select supported account type as needed

---

### Step 3: Configure Redirect URL

1. Under **Platform configurations**, select **Web**
2. Add your redirect URL

Example:

```text
https://yourdomain.com/redirect.php
```

> Redirect URL must use **HTTPS** and should be hosted on the same domain as your project.

---

### Step 4: Create Client Secret

1. Open your application
2. Go to:

```text
Certificates & secrets
```

3. Click:

```text
New client secret
```

4. Generate and copy the secret value

> Although the JavaScript picker may not directly require the secret, Azure requires it for proper application configuration.

---

### Step 5: Get Application (Client) ID

1. Open:

```text
Overview
```

2. Copy:

```text
Application (client) ID
```

---

### Step 6: Use Client ID in JavaScript

Add the copied Client ID in your OneDrive JavaScript options:

```javascript
var odOptions = {
    clientId: "YOUR_CLIENT_ID"
};
```

---

## Requirements

- HTTPS enabled domain
- Valid Microsoft Azure account
- Same domain redirect URL
- OneDrive JavaScript SDK integration
