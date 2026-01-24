E-commerce Management System

Project Overview

This project is a role-based E-commerce Management System designed to manage products, orders, and users with different permissions. The system supports Admins, Vendors, and Staff users, each with clearly defined responsibilities. It follows clean architecture principles and uses events, listeners, and notifications to ensure a professional and scalable workflow.

User Roles & Permissions

1. Admin

The Admin has full control over the system:

Manage all users (Admin, Vendor, Staff)

Approve or reject products added by vendors

Create and manage product categories

View and manage all orders

Update order status (pending, approved, completed, etc.)

Receive notifications when a new order is created


2. Vendor

The Vendor is responsible for product management only:

Add new products

Edit and delete own products

Products are not visible to staff or customers until approved by the Admin

Cannot manage categories or orders


3. Staff

The Staff acts as the customer/user:

View only approved products

Add products to cart

Create orders

Track order status


Core Features

Product Management

Products are created by Vendors

Admin approval is required before products become visible

Products belong to categories managed by the Admin


Cart System

Each Staff user has a cart

Products can be added, updated, or removed from the cart

Cart is converted into an order upon checkout


Order Management

Orders are created from the cart

Each order contains multiple order items

Admin manages order lifecycle and status


Events, Listeners & Notifications

When a Staff user creates an order:

An Event is triggered

A Listener handles the business logic

A Notification is sent to the Admin


Notifications can be stored in the database and/or sent via email


Database Tables

users (roles: admin, vendor, staff)

products

categories

carts

orders

order_items

notifications


Technologies & Concepts Used

Role-based Access Control (RBAC)

Authorization Policies

Events & Listeners

Notifications (Database / Email)

RESTful
